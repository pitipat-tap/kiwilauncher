<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['username', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];
	
	
	// Validators
	public static $login_rules = array(
        'username'=>'required',
        'password'=>'required',
    );
	
	public static $register_rules = array(
        'username'=>'required|between:4,32|unique:users',
        'email'=>'required|email|unique:users',
        'password'=>'required|min:6|confirmed',
    );
	
	public static function update_rules($id = null) {
		return array(
	        'email'=>'required|email|unique:users,email'.($id ? ",".$id : "")
	    );
	}
	
	
	public static $change_password_rules = array(
		"password" => "required|min:6|confirmed"
	);
	
	
	public function blogPosts()
	{
	    return $this->hasMany('App\Models\BlogPost', 'author_id');
	}

	public function imagePosts()
	{
	    return $this->hasMany('App\Models\ImagePost', 'author_id');
	}

}
