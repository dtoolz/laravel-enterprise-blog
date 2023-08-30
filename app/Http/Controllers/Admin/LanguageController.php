<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLanguageStoreRequest;
use App\Models\Language;
use Illuminate\Http\Request;
use Alert;
use App\Http\Requests\AdminLanguageUpdateRequest;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return view('admin.language.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.language.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminLanguageStoreRequest $request)
    {
        $language = new Language();
        $language->name = $request->name;
        $language->lang = $request->lang;
        $language->slug = $request->slug;
        $language->default = $request->default;
        $language->status = $request->status;
        $language->save();
        toast(__('Your language has been created successfully'),'success')->width('400px')->padding('5px');
        return redirect()->route('admin.language.index');
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
        $language = Language::findOrFail($id);
        return view('admin.language.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminLanguageUpdateRequest $request, string $id)
    {
        $language = Language::findOrFail($id);
        $language->name = $request->name;
        $language->lang = $request->lang;
        $language->slug = $request->slug;
        $language->default = $request->default;
        $language->status = $request->status;
        $language->save();
        toast(__('Your language has been updated successfully'),'success')->width('400px')->padding('5px');
        return redirect()->route('admin.language.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
           $language = Language::findOrFail($id);
           $language->delete();
           return response([
            'status' => 'success',
            'message' => __('Deleted Sucessfully')
           ]);
        } catch(\Throwable $th){
            return response([
                'status' => 'error',
                'message' => __('Something went wrong')
               ]);
        }


    }
}
