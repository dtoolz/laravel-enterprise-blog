<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminSocialLinkStoreRequest;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:footer index,admin'])->only(['index']);
        $this->middleware(['permission:footer create,admin'])->only(['create', 'store']);
        $this->middleware(['permission:footer update,admin'])->only(['edit', 'update']);
        $this->middleware(['permission:footer destroy,admin'])->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socialLinks = SocialLink::all();
        return view('admin.social-link.index', compact('socialLinks'));
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

        toast(__('admin.Created Successfully'), 'success');
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
        $socialLink = SocialLink::findOrFail($id);
        return view('admin.social-link.edit', compact('socialLink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminSocialLinkStoreRequest $request, string $id)
    {
        $socialLink = SocialLink::findOrFail($id);
        $socialLink->icon = $request->icon;
        $socialLink->url = $request->url;
        $socialLink->status = $request->status;
        $socialLink->save();

        toast(__('admin.Updated Successfully!'), 'success');
        return redirect()->route('admin.social-link.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SocialLink::findOrFail($id)->delete();

        return response(['status' => 'success', 'message' => __('admin.Deleted Successfully!')]);
    }
}
