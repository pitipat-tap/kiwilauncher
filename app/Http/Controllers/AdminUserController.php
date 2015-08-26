<?php namespace App\Http\Controllers;

use Request;
use Validator;
use Auth;
use Hash;
use Redirect;

use App\Models\User;

class AdminUserController extends Controller {
	
	// ----------------------------------------Users----------------------------------------
	public function users()
	{
		$q = Request::input("q");
		
		$users = null;
		
		if ($q != null && trim($q) != "") {
			$users = User::where("username", "LIKE", "%".$q."%")->
				orWhere("realname", "LIKE", "%".$q."%")->
				orWhere("email", "LIKE", "%".$q."%")->
				orderBy('created_at', 'DESC')->paginate(20);
		}
		else {
			$users = User::orderBy('created_at', "DESC")->paginate(20);
		}
		
		return view("admin.users", array("users" => $users));
	}
    
	
	public function newUser()
	{
		return view("admin.userNew");
	}
	
	
	public function createUser()
	{
		$validator = Validator::make(Request::all(), User::$register_rules);
        
        if ($validator->passes()) {
            $user = new User;
            $user->username = trim(Request::input('username'));
            $user->email = trim(Request::input('email'));
            $user->password = Hash::make(Request::input('password'));
            $user->role = Request::input('role');
			$user->realname = trim(Request::input('realname'));
			$user->info = trim(Request::input('info'));
			$user->profile_image = trim(Request::input("profile_image"));

			if ($user->save()) {
	            return Redirect::route('adminUsers')->with('success', 'New user was created');
	        } else {
	            return Redirect::back()->with('error', 'Cannot save data')->withInput(Request::except("profile_image"));
	        }
        } else {
            return Redirect::back()->with('error', 'Errors')->withErrors($validator)->withInput(Request::except("profile_image"));
        }
	}
	
	
	public function editUser($id)
	{
		$user = User::find($id);
		if (!$user) Redirect::route('adminUsers');
		elseif ($user->id == Auth::user()->id) return Redirect::route("adminProfileEdit");
		
		return view("admin.userEdit", array("user" => $user));
	}
	
	
	public function updateUser($id)
	{
		$user = User::find($id);
		if (!$user) return Redirect::route("adminUsers")->with('error', 'Cannot save data');
		
		// Change password case
		if (Request::input("password")!=null && Request::input("password")!="") {
			$validator = Validator::make(Request::all(), User::$change_password_rules);
			if ($validator->passes()) {
				$user->password = Hash::make(Request::input("password"));
			} else {
				return Redirect::back()->with('error', 'Errors')->withErrors($validator)->withInput();
			}
		}
		
		$validator = Validator::make(Request::all(), User::update_rules($user->id));
        
        if ($validator->passes()) {
            $user->email = trim(Request::input('email'));
			$user->role = Request::input('role');
			$user->realname = trim(Request::input('realname'));
			$user->info = trim(Request::input('info'));
			$user->profile_image = trim(Request::input("profile_image"));
			
            if ($user->save()) {
	            return Redirect::route('adminUsers')->with('success', 'Edited user data was saved');
	        } else {
	            return Redirect::back()->with('error', 'Cannot save data')->withInput(Request::except("profile_image"));
	        }
        } else {
            return Redirect::back()->with('error', 'Errors')->withErrors($validator)->withInput(Request::except("profile_image"));
        }
	}
	
	
	public function deleteUser($id)
	{
		// Check is exist, is current user
		$user = User::find($id);
		
		if (!$user) return Redirect::route("adminUsers")->with('error', 'Cannot delete data');
		if (Auth::user()->id == $user->id) return Redirect::route("adminUsers")->with('error', 'Cannot delete data');
		
		if (Request::input("option") == "delete_all") {
			$user->blogPosts()->delete();
			$user->imagePosts()->delete();
			$user->delete();
		}
		else {
			$user->blogPosts()->update(array("author_id" => Auth::user()->id));
			$user->imagePosts()->update(array("author_id" => Auth::user()->id));
			$user->delete();
		}
		
		return Redirect::route("adminUsers");
	}
    // ----------------------------------------Users----------------------------------------
	
}
	