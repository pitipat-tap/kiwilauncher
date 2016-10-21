<?php namespace App\Models\work;

use Illuminate\Database\Eloquent\Model;

class Screenshot extends Model {

	protected $table = 'work_image';

	public static $save_rules = array(
		"image_url" => "required"
	);

	public function posts()
	{
	    return $this->belongsTo('App\Models\work\Post', 'work_id');
	}
	
}