<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImagePost extends Model {

	protected $table = 'image_posts';
	
	public static $save_rules = array(
		"image_url" => "required"
	);
	
	public static $custom_messages = array(
		"image_url.required" => "The image is required."
	);
	
	public function author()
	{
	    return $this->belongsTo('App\Models\User', 'author_id');
	}
	
	public function tags()
	{
		return $this->belongsToMany('App\Models\ImageTag', 'image_tags_posts', 'image_id', 'tag_id')->withTimestamps();
	}

}