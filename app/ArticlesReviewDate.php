<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticlesReviewDate extends Model
{
    //

    public function article()
    {
        return $this->belongsTo('App\Article', 'article_id');
    }
}
