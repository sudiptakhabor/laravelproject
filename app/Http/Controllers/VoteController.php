<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Vote;
use Auth;

class VoteController extends Controller
{
    public function vote($id) {
        
        $alreadyComment = Vote::where([['user_id', '=', Auth::id()], ['article_id', '=', $id]])->exists();
        
        if(!$alreadyComment) {
            $vote = new Vote;
            $vote->user_id = Auth::id();
            $vote->article_id = $id;
            $vote->Save();    
        }

        return redirect()->back();
        
    }
}
