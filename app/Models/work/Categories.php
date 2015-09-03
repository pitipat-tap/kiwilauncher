<?php namespace App\Models\work;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model {

	protected $table = 'work_categories';
    
    public static $save_rules = array(
        "name" => "required|unique:categories"
    );
	
	public function posts()
	{
	    return $this->belongsToMany('App\Models\work\Post', 'work_post_categories', 'categories_id', 'work_id')->withTimestamps();
	}

}