<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminNewsCreateRequest;
use App\Models\Category;
use App\Models\Language;
use App\Models\News;
use App\Models\Tag;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return view('admin.news.index', compact('languages'));
    }

    public function fetchCategory(Request $request)
    {
        $categories = Category::where('language', $request->lang)->get();
        return $categories;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::all();
        return view('admin.news.create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminNewsCreateRequest $request)
    {
        //handle image
        $imagePath = $this->handleFileUpload($request, 'image');
        $news = new News();
        $news->language = $request->language;
        $news->category_id = $request->category;
        $news->author_id = Auth::guard('admin')->user()->id;
        $news->image = $imagePath;
        $news->title = $request->title;
        $news->slug = \Str::slug($request->title);
        $news->content = $request->content;
        $news->meta_title = $request->meta_title;
        $news->meta_description = $request->meta_description;
        $news->is_breaking_news = $request->is_breaking_news == 1 ? 1 : 0;
        $news->show_at_slider = $request->show_at_slider == 1 ? 1 : 0;
        $news->show_at_popular = $request->show_at_popular == 1 ? 1 : 0;
        $news->status = $request->status == 1 ? 1 : 0;
        $news->save();

        $tags = explode(',', $request->tags);
        $tagIds = [];

        foreach ($tags as $tag) {
            $item = new Tag();
            $item->name = $tag;
            $item->language = $news->language;
            $item->save();

            $tagIds[] = $item->id;
        }

        $news->tags()->attach($tagIds);

        toast(__('Created Successfully!'), 'success')->width('330');

        return redirect()->route('admin.news.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    //show the toggle status of news posts
    public function toggleNewsStatus(Request $request)
    {
        try {
            $news = News::findOrFail($request->id);
            $news->{$request->name} = $request->status;
            $news->save();

            return response(['status' => 'success', 'message' => __('Updated successfully')]);
        } catch (\Throwable $th) {
            throw $th;
        }
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
