<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\HomeSectionSetting;
use App\Models\News;
use App\Models\SocialCount;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $breakingNews = News::where([
            'is_breaking_news' => 1,
        ])->GetActiveNews()->GetLocalizedLanguage()->orderBy('id', 'DESC')->take(9)->get();

        $heroSlider = News::with(['category', 'author'])->where([
            'show_at_slider' => 1,
        ])->GetActiveNews()->GetLocalizedLanguage()->orderBy('id', 'DESC')->take(7)->get();

        $recentNews = News::with(['category', 'author'])->GetActiveNews()->GetLocalizedLanguage()->orderBy('id', 'DESC')->take(6)->get();
        $popularNews = News::with(['category'])->where('show_at_popular', 1)->GetActiveNews()->GetLocalizedLanguage()->orderBy('updated_at', 'DESC')->take(4)->get();

        $homeSectionSetting = HomeSectionSetting::where('language', getLanguage())->first();
        if ($homeSectionSetting) {
            $categorySectionOne = News::where('category_id', $homeSectionSetting->category_section_one)
                ->GetActiveNews()->GetLocalizedLanguage()
                ->orderBy('id', 'DESC')
                ->take(8)
                ->get();

            $categorySectionTwo = News::where('category_id', $homeSectionSetting->category_section_two)
                ->GetActiveNews()->GetLocalizedLanguage()
                ->orderBy('id', 'DESC')
                ->take(8)
                ->get();

            $categorySectionThree = News::where('category_id', $homeSectionSetting->category_section_three)
                ->GetActiveNews()->GetLocalizedLanguage()
                ->orderBy('id', 'DESC')
                ->take(6)
                ->get();

            $categorySectionFour = News::where('category_id', $homeSectionSetting->category_section_four)
                ->GetActiveNews()->GetLocalizedLanguage()
                ->orderBy('id', 'DESC')
                ->take(4)
                ->get();
        }

        $mostViewedPosts = News::GetActiveNews()->GetLocalizedLanguage()
            ->orderBy('views', 'DESC')
            ->take(3)
            ->get();

        $socialCounts = SocialCount::where(['status' => 1, 'language' => getLanguage()])->get();
        $mostCommonTags = $this->mostCommonTags();

        return view('frontend.home', compact(
            'breakingNews',
            'heroSlider',
            'recentNews',
            'popularNews',
            'categorySectionOne',
            'categorySectionTwo',
            'categorySectionThree',
            'categorySectionFour',
            'mostViewedPosts',
            'socialCounts',
            'mostCommonTags'
            )
        );
    }

    public function showNewsDetails(string $slug)
    {
        $news = News::with(['author', 'tags', 'comments'])->where('slug', $slug)->GetActiveNews()->GetLocalizedLanguage()->first();

        $this->countViews($news);
        $recentNews = News::with(['category', 'author'])->where('slug', '!=', $news->slug)->GetActiveNews()->GetLocalizedLanguage()->orderBy('id', 'DESC')->take(4)->get();

        $mostCommonTags = $this->mostCommonTags();

        $nextPost = News::where('id', '>', $news->id)->GetActiveNews()->GetLocalizedLanguage()->orderBy('id', 'asc')->first();
        $previousPost = News::where('id', '<', $news->id)->GetActiveNews()->GetLocalizedLanguage()->orderBy('id', 'desc')->first();

        $relatedPosts = News::where('slug', '!=', $news->slug)->where('category_id', $news->category_id)->GetActiveNews()->GetLocalizedLanguage()->take(5)->get();

        return view('frontend.news-details', compact('news', 'recentNews', 'mostCommonTags', 'nextPost', 'previousPost', 'relatedPosts'));
    }

    public function news(Request $request)
    {
        $news = News::query();

        $news->when($request->has('category') && !empty($request->category), function($query) use ($request) {
            $query->whereHas('category', function($query) use ($request) {
                $query->where('slug', $request->category);
            });
        });

        $news->when($request->has('search'), function($query) use ($request) {
            $query->where(function($query) use ($request){
                $query->where('title', 'like','%'.$request->search.'%')
                    ->orWhere('content', 'like','%'.$request->search.'%');
            })->orWhereHas('category', function($query) use ($request){
                $query->where('name', 'like','%'.$request->search.'%');
            });
        });

        $news = $news->GetActiveNews()->GetLocalizedLanguage()->paginate(4);

        $recentNews = News::with(['category', 'author'])->GetActiveNews()->GetLocalizedLanguage()->orderBy('id', 'DESC')->take(4)->get();
        $mostCommonTags = $this->mostCommonTags();
        $categories = Category::where(['status' => 1, 'language' => getLanguage()])->get();

        return view('frontend.news', compact('news', 'recentNews', 'mostCommonTags', 'categories'));
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

    public function mostCommonTags()
    {
        return Tag::select('name', \DB::raw('COUNT(*) as count'))
            ->where('language', getLanguage())
            ->groupBy('name')
            ->orderByDesc('count')
            ->take(15)
            ->get();
    }

    public function handleComment(Request $request)
    {
        $request->validate([
            'comment' => ['required', 'string', 'max:1000'],
        ]);

        $comment = new Comment();
        $comment->news_id = $request->news_id;
        $comment->user_id = Auth::user()->id;
        $comment->parent_id = $request->parent_id;
        $comment->comment = $request->comment;
        $comment->save();
        toast(__('Comment added successfully!'), 'success');

        return redirect()->back();
    }

    public function handleReply(Request $request)
    {
        $request->validate([
            'reply' => ['required', 'string', 'max:1000'],
        ]);

        $comment = new Comment();
        $comment->news_id = $request->news_id;
        $comment->user_id = Auth::user()->id;
        $comment->parent_id = $request->parent_id;
        $comment->comment = $request->reply;
        $comment->save();
        toast(__('Comment added successfully!'), 'success');

        return redirect()->back();
    }

    public function commentDelete(Request $request)
    {
        $comment = Comment::findOrFail($request->id);
        if (Auth::user()->id === $comment->user_id) {
            $comment->delete();
            return response(['status' => 'success', 'message' => __('Deleted Successfully!')]);
        }
        return response(['status' => 'error', 'message' => __('Someting went wrong!')]);
    }
}
