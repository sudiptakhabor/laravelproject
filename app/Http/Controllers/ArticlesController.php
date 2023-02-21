<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Article;
use App\ArticleCategory;
use App\Comment;
use App\Vote;
use Auth;

class ArticlesController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Categories
        $categories = ArticleCategory::where('status', '1')
                                    ->orderBy('title', 'ASC')
                                    ->get();

        // Articles                                
        $articles = Article::where('status', '1')
                            ->where('start_date', '<=', $this->today)
                            ->orderBy('start_date', 'desc')
                            ->orderBy('id', 'desc')
                            ->paginate(8);

        // Recent Articles                                
        $recent_articles = Article::where('status', '10')
                                ->where('start_date', '<=', $this->today)
                                ->orderBy('start_date', 'desc')
                                ->orderBy('id', 'desc')
                                ->take(5)
                                ->get();

        return view('articles', compact('categories', 'articles', 'recent_articles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function category($id)
    {
        // Categories
        $categories = ArticleCategory::where('status', '1')
                                    ->orderBy('title', 'ASC')
                                    ->get();

        // Article Categories
        $article_category = ArticleCategory::find($id);

        // Articles                                
        $articles = Article::where('category_id', $id)
                            ->where('status', '10')
                            ->where('start_date', '<=', $this->today)
                            ->orderBy('start_date', 'desc')
                            ->orderBy('id', 'desc')
                            ->paginate(5);

        // Recent Articles                                
        $recent_articles = Article::where('status', '1')
                                ->where('review_status', '2')
                                ->where('start_date', '<=', $this->today)
                                ->orderBy('start_date', 'desc')
                                ->orderBy('id', 'desc')
                                ->take(5)
                                ->get();

        return view('article-category', compact('categories', 'article_category', 'articles', 'recent_articles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Articles                                
        $articles = Article::where('id', $id)
                            ->where('status', '10')
                            ->where('start_date', '<=', $this->today)
                            ->get();

        // Comments                                
        $comments = Comment::where('article_id', $id)
                            ->where('status', '1')
                            ->orderBy('id', 'desc')
                            ->get();
                            
        if (Auth::check()){
            $alreadyComment = Vote::where([['user_id', '=', Auth::id()], ['article_id', '=', $id]])->exists();
            return view('article', compact('articles', 'comments', 'alreadyComment'));
        }                            
        

        return view('article', compact('articles', 'comments'));
    }
    
    
}
