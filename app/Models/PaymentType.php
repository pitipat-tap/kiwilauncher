<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model {

	protected $table = 'payment_type';
	
	public static function save_rules($id = null) {
		return array(
			"type" => "required|unique:payment_type,type".($id ? ",".$id : ""),
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
