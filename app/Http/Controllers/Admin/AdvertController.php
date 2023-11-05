<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAdvertUpdateRequest;
use App\Models\Advert;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class AdvertController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:advertisement index,admin'])->only(['index']);
        $this->middleware(['permission:advertisement update,admin'])->only(['update']);
    }

    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advert = Advert::first();
        return view('admin.advert.index', compact('advert'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(AdminAdvertUpdateRequest $request, string $id)
    {
        $home_top_bar_advert = $this->handleFileUpload($request, 'home_top_bar_advert');
        $home_middle_page_advert = $this->handleFileUpload($request, 'home_middle_page_advert');
        $news_details_page_advert = $this->handleFileUpload($request, 'news_details_page_advert');
        $news_page_advert = $this->handleFileUpload($request, 'news_page_advert');
        $side_bar_advert = $this->handleFileUpload($request, 'side_bar_advert');
        $advert = Advert::first();

        Advert::updateOrCreate(
            ['id' => $id],
            [
                'home_top_bar_advert' => !empty($home_top_bar_advert) ? $home_top_bar_advert : $advert->home_top_bar_advert,
                'home_middle_page_advert' => !empty($home_middle_page_advert) ? $home_middle_page_advert : $advert->home_middle_page_advert,
                'news_details_page_advert' => !empty($news_details_page_advert) ? $news_details_page_advert : $advert->news_details_page_advert,
                'news_page_advert' => !empty($news_page_advert) ? $news_page_advert : $advert->news_page_advert,
                'side_bar_advert' => !empty($side_bar_advert) ? $side_bar_advert : $advert->side_bar_advert,
                'home_top_bar_advert_status' => $request->home_top_bar_advert_status == 1 ? 1 : 0,
                'home_middle_page_advert_status' => $request->home_middle_page_advert_status == 1 ? 1 : 0,
                'news_details_page_advert_status' => $request->news_details_page_advert_status == 1 ? 1 : 0,
                'news_page_advert_status' => $request->news_page_advert_status == 1 ? 1 : 0,
                'side_bar_advert_status' => $request->side_bar_advert_status == 1 ? 1 : 0,
                'home_top_bar_advert_url' => $request->home_top_bar_advert_url,
                'home_middle_page_advert_url' => $request->home_middle_page_advert_url,
                'news_details_page_advert_url' => $request->news_details_page_advert_url,
                'news_page_advert_url' => $request->news_page_advert_url,
                'side_bar_advert_url' => $request->side_bar_advert_url,
            ]
        );

        toast(__('Updated Successfully'), 'success');

        return redirect()->back();
    }

}
