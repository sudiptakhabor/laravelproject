<?php

namespace App\Http\Controllers\Reviewer;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Article;
use App\ArticleCategory;
use Carbon\Carbon;
use Session;
use Image;
use File;
use Auth;
use DB;
use App\User;



class HistoryController extends Controller
{
    //
    public function __construct()
    {
        // Page Data
        $this->title = 'History';
        $this->url = 'history';
    }
    public function approve()
    {
        //
        $user_id = Auth::user()->id;
        $rows = Article::where('status', '2')->orderBy('updated_at', 'desc')->get();
        $categories = ArticleCategory::where('status', '1')->get();


        $title = '  History';
        $url = $this->url;

        $route_name = 'approve';

        return view('reviewer.'.$url.'.index', compact('rows', 'categories', 'title', 'url', 'route_name'));
    }

}
