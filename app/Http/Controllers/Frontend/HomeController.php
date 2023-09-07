<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;

class HomeController extends Controller
{
    public function index()
    {
        $breakingNews = News::where([
            'is_breaking_news' => 1,
        ])->GetActiveNews()->GetLocalizedLanguage()->orderBy('id', 'DESC')->take(9)->get();
        return view('frontend.home', compact('breakingNews'));
    }

    public function showNewsDetails(string $slug)
    {
        $news = News::with(['author'])->where('slug', $slug)->GetActiveNews()->GetLocalizedLanguage()->first();
        $this->countViews($news);
        return view('frontend.news-details', compact('news'));
    }

    public function countViews($news)
    {
        if (session()->has('viewed_posts')) {
            $postIds = session('viewed_posts');
            if (!in_array($news->id, $postIds)) {
                $postIds[] = $news->id;
                $news->increment('views');
            }
            session(['viewed_posts' => $postIds]);
        } else {
            session(['viewed_posts' => [$news->id]]);
            $news->increment('views');
        }

    }
}
