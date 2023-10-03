<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminSocialLinkStoreRequest;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.social-link.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.social-link.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminSocialLinkStoreRequest $request)
    {
        $socialLink = new SocialLink();
        $socialLink->icon = $request->icon;
        $socialLink->url = $request->url;
        $socialLink->status = $request->status;
        $socialLink->save();

        toast(__('Created Successfully'), 'success');
        return redirect()->route('admin.social-link.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
