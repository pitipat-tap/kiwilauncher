<?php namespace App\Models\work;

use Illuminate\Database\Eloquent\Model;

class PostCategories extends Model {

	protected $table = 'work_post_categories';
	
	public function posts()
	{
	    return $this->belongsTo('App\Models\work\Post', 'work_id');
	}

	public function categories()
	{
	    return $this->belongsTo('App\Models\work\Categories', 'categories_id');
	}
}