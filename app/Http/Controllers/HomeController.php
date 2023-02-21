<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Article;
use App\ArticleCategory;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Date
        $this->today = Carbon::today();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Article Categories
        $article_categories = ArticleCategory::where('home_flag', '1')
                                            ->where('status', '1')
                                            ->orderBy('title', 'asc')
                                            ->get();

        // Articles                                
        $articles = Article::where('status', '10')
                            ->where('start_date', '<=', $this->today)
                            ->orderBy('start_date', 'desc')
                            ->orderBy('id', 'desc')
                            ->paginate(5);

        // Grid Articles                                
        $grid_articles = Article::join('article_categories', 'article_categories.id', 'articles.category_id')
                            ->select('articles.*')
                            ->where('article_categories.home_flag', '1')
                            ->where('article_categories.status', '10')
                            ->where('articles.status', '10')
                            ->where('articles.start_date', '<=', $this->today)
                            ->orderBy('articles.start_date', 'desc')
                            ->orderBy('articles.id', 'desc')
                            ->take(12)
                            ->get();
                            
        // Authors                                
        $authors = User::select('image_path','id','name')
                        ->where('user_type', 'W')
                        ->orderBy('id', 'desc')
                        ->paginate(10);

        return view('index', compact('article_categories', 'articles', 'grid_articles','authors'));
    }
}
