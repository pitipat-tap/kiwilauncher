<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkImage extends Model {

	protected $table = 'work_image';

	public function workOwner()
	{
	    return $this->belongsTo('App\Models\WorkPost', 'work_id');
	}

}