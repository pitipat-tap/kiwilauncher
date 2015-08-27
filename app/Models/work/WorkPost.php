<?php namespace App\Models\work;

use Illuminate\Database\Eloquent\Model;

class WorkPost extends Model {

	protected $table = 'work_post';
	
	public static function save_rules($id = null) {
		return array(
			"status" => "in:draft,published",
			"title" => "required",
			"url" => "alpha_dash|required|unique:work_post,url".($id ? ",".$id : ""),
			"link_url" => "required",
			"description" => "required",
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

	public function categories()
	{
		return $this->belongsToMany('App\Models\work\WorkCategories', 'work_post_categories', 'work_id', 'categories_id')->withTimestamps();
	}
}