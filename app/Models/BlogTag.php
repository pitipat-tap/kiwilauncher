<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model {

	protected $table = 'blog_tags';
    
    public static $save_rules = array(
        "name" => "required|unique:blog_tags",
    );
	
	public function posts()
	{
	    return $this->belongsToMany('App\Models\BlogPost', 'blog_tags_posts', 'tag_id', 'post_id')->withTimestamps();;
	}

}