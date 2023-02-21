<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Review_comment extends Model
{
protected $table = 'review_comment';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'reviewer_id', 'article_id','correction_string', 'comment','color','score'
	];

}
?>