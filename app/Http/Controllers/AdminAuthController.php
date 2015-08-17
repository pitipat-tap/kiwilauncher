<?php namespace App\Http\Controllers;

use Input;
use Request;
use Validator;
use Hash;
use Auth;
use Redirect;

use App\Models\User;

class AdminAuthController extends Controller {
	
	public function login()
    {
        return view("admin.login");
    }
    
    
    public function authenticate()
    {
        $input = Request::all();
        $validator = Validator::make($input, User::$login_rules);
        
        if ($validator->passes()) {
        	$field = filter_var($input["username"], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
            $data = array($field => $input["username"], "password" => $input["password"]);
            $remember = Request::input("remember");
            
            if (Auth::attempt($data, $remember)) {
                return Redirect::route('admin');
            } else {
                return Redirect::back()->with('error', 'Username or password is incorrect')->withInput();
            }
            
        } else {
            return Redirect::back()->with('error', 'Errors')->withErrors($validator)->withInput();
        }
    }

    public function register()
    {
        return view("admin.register");
    }

    public function create()
    {
        $validator = Validator::make(Request::all(), User::$register_rules);
        
        if ($validator->passes()) {
            $user = new User;
            $user->username = Request::input('username');
            $user->email = Request::input('email');
            $user->password = Hash::make(Request::input('password'));
            $user->role = "admin";
            $user->realname = "";
            $user->info = "";
            $user->save();
            
            return Redirect::route('adminLogin')->with('success', 'User was created');
        } else {
            return Redirect::back()->with('error', 'Errors')->withErrors($validator)->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('adminLogin');
    }
}
