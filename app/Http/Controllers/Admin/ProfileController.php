<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProfileUpdateRequest;
use App\Http\Requests\AdminUpdatePasswordRequest;
use App\Models\Admin;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;


class ProfileController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::guard('admin')->user();
        return view('admin.profile.index', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminProfileUpdateRequest $request, string $id)
    {
        //handle generate imagePath from trait
        $imagePath = $this->handleFileUpload($request, 'image', $request->old_image);

        $admin = Admin::findOrFail($id);
        $admin->image = !empty($imagePath) ? $imagePath : $request->old_image;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();
        toast(__('Your profile was updated successfully'),'success')->width('400px')->padding('5px');
        return redirect()->back();
    }
     //handles admin password update
    public function passwordUpdate(AdminUpdatePasswordRequest $request, string $id)
    {
          $admin = Admin::findOrFail($id);
          $admin->password = bcrypt($request->password);
          $admin->save();
          toast(__('Your password was updated successfully'), 'success')->width('400px')->padding('5px');
          return redirect()->back();
    }

}
