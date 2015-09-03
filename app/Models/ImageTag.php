<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageTag extends Model {

	protected $table = 'image_tags';
    
    public static $save_rules = array(
        "name" => "required|unique:image_tags",
    );
	
	public function posts()
	{
	    return $this->belongsToMany('App\Models\ImagePost', 'image_tags_posts', 'tag_id', 'image_id')->withTimestamps();;
	}

}