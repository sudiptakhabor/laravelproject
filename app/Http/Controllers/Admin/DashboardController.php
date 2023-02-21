<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\ArticleIssue;
use App\Comment;
use App\User;
use Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Page Data
        $this->title = 'Dashboard';
        $this->url = 'dashboard';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = $this->title;
        $url = $this->url;


        $user_type = Auth::user()->user_type;
        $user_id = Auth::user()->id;

        if( $user_type == 'W' ){

            $rows = ArticleIssue::join('articles', 'articles.id', 'article_issues.article_id')
                                ->select('article_issues.*')
                                ->where('articles.writer_id', $user_id)
                                ->where('article_issues.status', 1)
                                ->orderBy('article_issues.id', 'desc')
                                ->get();
                                
            
            $approve = Article::where(function ($query) use ($user_id) {
                        $query->where('writer_id', '=', $user_id);
                    })->where(function ($query) {
                        $query->where('status', '=', 7)
                              ->orWhere('status', '=', 9);
                    })->count();
            
            $pending = Article::where(function ($query) use ($user_id) {
                        $query->where('writer_id', '=', $user_id);
                    })->where(function ($query) {
                        $query->where('status', '=', 1)
                              ->orWhere('status', '=', 2)
                              ->orWhere('status', '=', 3)
                              ->orWhere('status', '=', 6)
                              //->orWhere('status', '=', 7)
                              ->orWhere('status', '=', 9);
                    })->count();
                    
            $reject = Article::where(function ($query) use ($user_id) {
                        $query->where('writer_id', '=', $user_id);
                    })->where(function ($query) {
                        $query->where('status', '=', 5)
                              ->orWhere('status', '=', 8)
                              ->orWhere('status', '=', 11);
                    })->count();
                                
            
           $draft =  Article::where('status', '0')->where('articles.writer_id', $user_id)->count();
            
            $issue = ArticleIssue::join('articles', 'articles.id', 'article_issues.article_id')
                                ->select('article_issues.*')
                                ->where('articles.writer_id', $user_id)
                                ->where('article_issues.status', 1)
                                ->get();
            $comment = Comment::join('articles', 'articles.id', 'comments.article_id')
                                ->join('users', 'users.id', 'articles.writer_id')
                                ->select('comments.*')
                                ->where('users.id', $user_id)
                                ->where('comments.status', 1)
                                ->get();
                                
            //published date count
            $publishedArticle = Article::where('status', '10')->where('articles.writer_id', $user_id)->count();         
            $users = '';
            $authors = '';
            $reviewers = '';
            $editors = '';
            $publishers = '';
           

        }
        else if( $user_type == 'E' ) {

            $rows = Article::where('status', 1)
                            ->orwhere('status', 2)
                            ->orwhere('status', 3)
                            ->orwhere('status', 6)
                            ->orderBy('updated_at', 'desc')
                            ->get();
            
            $approve = Article::where(function ($query) {
                                    $query->where('status', '=', 7)
                                          ->orWhere('status', '=', 9);
                                })->count();
                        
            $pending = Article::where(function ($query) {
                        $query->where('status', '=', 1)
                              ->orWhere('status', '=', 2)
                              ->orWhere('status', '=', 3)
                              ->orWhere('status', '=', 4)
                              ->orWhere('status', '=', 6);
                    })->count();
                    
            $reject = Article::where(function ($query) {
                        $query->where('status', '=', 5)
                              ->orWhere('status', '=',8)
                              ->orWhere('status', '=',11);
                    })->count();
                    
            
            $issue = '';
            $comment = Comment::all();
            $users = User::where('user_type', 'W')->get();
            $authors = User::where('user_type', 'W')->count();
            $reviewers = '';
            $editors = '';
            $publishers = '';
            $draft = '';
            $publishedArticle = '';
           

        }
        else if( $user_type == 'R' ) {

            $rows = Article::where('status', 1)
                            ->orWhere('status', '=', 2)
                            ->orWhere('status', '=', 3)
                            ->orWhere('status', '=', 4)
                            ->orWhere('status', '=', 6)
                            ->orderBy('updated_at', 'desc')
                            ->get();
            
            $approve = Article::where(function ($query) {
                                    $query->where('status', '=', 7);
                                })->count();
                        
            $pending = Article::where(function ($query) {
                        $query->where('status', '=', 1)
                              ->orWhere('status', '=', 2)
                              ->orWhere('status', '=', 3)
                              ->orWhere('status', '=', 4)
                              ->orWhere('status', '=', 6);
                    })->count();
                    
            $reject = Article::where(function ($query) {
                        $query->where('status', '=', 5)
                              ->orWhere('status', '=',8)
                              ->orWhere('status', '=',11);
                    })->count();
            

            
            $issue = '';
            $comment = Comment::all();
            $users = User::where('user_type', 'W')->get();
            $authors = User::where('user_type', 'W')->count();
            $reviewers = '';
            $editors = '';
            $publishers = '';
            $draft = '';
            $publishedArticle = '';
           

        } 
        else if( $user_type == 'P' ) {

            $rows = Article::where('status', 1)
                            ->orWhere('status', '=', 2)
                            ->orWhere('status', '=', 3)
                            ->orWhere('status', '=', 4)
                            ->orWhere('status', '=', 6)
                            ->orderBy('updated_at', 'desc')
                            ->get();

            $approve = Article::where(function ($query) {
                                    $query->where('status', '=', 7);
                                })->count();
                        
            $pending = Article::where(function ($query) {
                        $query->where('status', '=', 1)
                              ->orWhere('status', '=', 2)
                              ->orWhere('status', '=', 3)
                              ->orWhere('status', '=', 4)
                              ->orWhere('status', '=', 6);
                    })->count();
                    
            $reject = Article::where(function ($query) {
                        $query->where('status', '=', 5)
                              ->orWhere('status', '=',8)
                              ->orWhere('status', '=',11);
                    })->count();
            
            $issue = '';
            $comment = Comment::all();
            $users = User::where('user_type', 'W')->get();
            $authors = User::where('user_type', 'W')->count();
            $reviewers = '';
            $editors = '';
            $publishers = '';
            $draft = '';
            $publishedArticle = '';
           

        }
        else if( $user_type == 'A' ) {

            $rows = Article::where('status', 4)
                            ->orwhere('status', 7)
                            ->orwhere('status', 10)
                            ->orderBy('updated_at', 'desc')
                            ->get();

            $approve = Article::where('status', '4')
                                ->orwhere('status', 7)                          
                                ->orwhere('status', 10)
                                ->count();
                                
            $pending = Article::where('status', '1')
                                ->orwhere('status', 3)                          
                                ->orwhere('status', 6)
                                ->orwhere('status', 9)
                                ->count();
                                
            $reject = Article::where('status', '5')
                                ->orwhere('status', 8)                          
                                ->orwhere('status', 11)
                                ->count();
            $issue = '';
            $comment = Comment::all();
            
            $authors = User::where('user_type', 'W')->count();
            $reviewers = User::where('user_type', 'R')->count();
            $editors = User::where('user_type', 'E')->count();
            $publishers = User::where('user_type', 'P')->count();
            $draft = '';
            $publishedArticle = '';
            
            
        }

        return view('admin.index', compact('title', 'url', 'rows', 'approve', 'pending', 'issue', 'comment', 'reject', 'draft', 'authors', 'reviewers', 'editors', 'publishers', 'publishedArticle'));
    }
    
    public function approval()
    {
        return view('auth.approval');
    }
}
