<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReceivedMail;
use Illuminate\Http\Request;

class ContactFormMessageController extends Controller
{
    public function index()
    {
        $messages = ReceivedMail::all();
        return view('admin.contact-form-message.index', compact('messages'));
    }
}
