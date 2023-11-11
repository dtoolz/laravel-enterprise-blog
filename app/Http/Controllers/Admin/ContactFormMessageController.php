<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Contact;
use App\Models\ReceivedMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormMessageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:contact message index,admin'])->only(['index']);
        $this->middleware(['permission:contact message update,admin'])->only(['sendReply']);
    }

    public function index()
    {
        ReceivedMail::query()->update(['seen' => 1]);
        $messages = ReceivedMail::all();
        return view('admin.contact-form-message.index', compact('messages'));
    }

    public function sendReply(Request $request)
    {
        $request->validate([
            'subject' => ['required', 'max:255'],
            'message' => ['required']
        ]);

        try {
            $contact = Contact::where('language', 'en')->first();

            /** Send mail */
            Mail::to($request->email)->send( new ContactMail($request->subject, $request->message, $contact->email));

            $setReplied = ReceivedMail::find($request->message_id);
            $setReplied->replied = 1;
            $setReplied->save();

            toast(__('admin.Mail Sent Successfully'), 'success');

            return redirect()->back();
        } catch (\Throwable $th) {
            toast($th->getMessage(), 'error');

            return redirect()->back();
        }
    }
}
