<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkPost extends Model {

	protected $table = 'work_history';
	
	public static function save_rules($id = null) {
		return array(
			"status" => "in:draft,published",
			"title" => "required",
			"url" => "alpha_dash|required|unique:blog_posts,url".($id ? ",".$id : ""),
			"link_url" => "required",
			"description" => "required",
			//"categories" => "required",
			"feature_image_url" => "required"
		);
	}
	
	public static $custom_messages = array(
		"feature_image_url.required" => "The featured image is required."
	);
	
	public function author()
	{
	    return $this->belongsTo('App\Models\User', 'author_id');
	}
}