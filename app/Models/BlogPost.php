<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model {

	protected $table = 'blog_posts';
	
	public static function save_rules($id = null) {
		return array(
			"title" => "required",
			"url" => "alpha_dash|required|unique:blog_posts,url".($id ? ",".$id : ""),
			"content" => "required",
			"status" => "in:draft,published",
			"feature_image_url" => "required",
			"categories" => "array"
		);
	}
	
	public static $custom_messages = array(
		"feature_image_url.required" => "The featured image is required."
	);
	
	public function author()
	{
	    return $this->belongsTo('App\Models\User', 'author_id');
	}
	
	public function tags()
	{
		return $this->belongsToMany('App\Models\BlogTag', 'blog_tags_posts', 'post_id', 'tag_id')->withTimestamps();
	}

}