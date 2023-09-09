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
        $news = News::with(['author', 'tags'])->where('slug', $slug)->GetActiveNews()->GetLocalizedLanguage()->first();

        $recentNews = News::with(['category', 'author'])->where('slug', '!=', $news->slug)->GetActiveNews()->GetLocalizedLanguage()->orderBy('id', 'DESC')->take(4)->get();

        $this->countViews($news);
        return view('frontend.news-details', compact('news', 'recentNews'));
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
