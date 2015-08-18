<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkImage extends Model {

	protected $table = 'pic_work_history';

	public function workOwner()
	{
	    return $this->belongsTo('App\Models\WorkPost', 'work_id');
	}

}