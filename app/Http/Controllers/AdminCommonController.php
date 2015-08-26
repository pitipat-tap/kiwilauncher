<?php namespace App\Http\Controllers;

use Request;
use Auth;
use Validator;
use Redirect;
use DB;

use App\Models\user;
use App\Models\BlogPost;
use App\Models\ImagePost;
use Illuminate\Support\Facades\Hash;

class AdminCommonController extends Controller {
	
	public function index()
	{
		$blogposts = BlogPost::all();
		$imageposts = ImagePost::all();
		// $subscriptions = Subscription::all();
		
		$blogposts_mostviewed = BlogPost::orderBy("hits", "DESC")->orderBy("created_at", "DESC")->take(5)->get();
		$blogposts_recent = BlogPost::orderBy("updated_at", "DESC")->take(3)->get();
		
		$imageposts_recent = ImagePost::orderBy("updated_at", "DESC")->take(6)->get();
		
		return view("admin.index", array(
			"blogposts" => $blogposts,
			"imageposts" => $imageposts,
			// "subscriptions" => $subscriptions,
			"blogposts_mostviewed" => $blogposts_mostviewed,
			"blogposts_recent" => $blogposts_recent,
			"imageposts_recent" => $imageposts_recent
		));
	}
	
	
	// --------------------------------------Graph functions----------------------------------------
	public function statisticGraph()
	{
		// PostgreSQL
		$blogposts_month = DB::table("blog_posts")->select(DB::raw(
				"EXTRACT (year FROM created_at) as year, EXTRACT (month FROM created_at) as month, COUNT(*) as count"
			))->
			whereRaw("created_at <= NOW() AT TIME ZONE 'Asia/Bangkok'")->
			groupBy("year")->groupBy("month")->
			orderBy("year", "ASC")->
			orderBy("month", "ASC")->
			take(6)->get();
			
		$imageposts_month = DB::table("image_posts")->select(DB::raw(
				"EXTRACT (year FROM created_at) as year, EXTRACT (month FROM created_at) as month, COUNT(*) as count"
			))->
			whereRaw("created_at <= NOW() AT TIME ZONE 'Asia/Bangkok'")->
			groupBy("year")->groupBy("month")->
			orderBy("year", "ASC")->
			orderBy("month", "ASC")->
			take(6)->get();
			
		// $subscriptions_month = DB::table("subscriptions")->select(DB::raw(
		// 		"EXTRACT (year FROM created_at) as year, EXTRACT (month FROM created_at) as month, COUNT(*) as count"
		// 	))->
		// 	whereRaw("created_at <= NOW() AT TIME ZONE 'Asia/Bangkok'")->
		// 	groupBy("year")->groupBy("month")->
		// 	orderBy("year", "ASC")->
		// 	orderBy("month", "ASC")->
		// 	take(6)->get();
		
		// // MySQL
		// $blogposts_month = DB::table("blog_posts")->select(DB::raw(
		// 		"YEAR(created_at) year, MONTH(created_at) month, COUNT(*) count"
		// 	))->
		// 	whereRaw("created_at <= NOW()")->
		// 	groupBy("year")->groupBy("month")->
		// 	orderBy("year", "ASC")->
		// 	orderBy("month", "ASC")->
		// 	take(6)->get();
		
		// $imageposts_month = DB::table("image_posts")->select(DB::raw(
		// 		"YEAR(created_at) year, MONTH(created_at) month, COUNT(*) count"
		// 	))->
		// 	whereRaw("created_at <= NOW()")->
		// 	groupBy("year")->groupBy("month")->
		// 	orderBy("year", "ASC")->
		// 	orderBy("month", "ASC")->
		// 	take(6)->get();
		
		// $subscriptions_month = DB::table("subscriptions")->select(DB::raw(
		// 		"YEAR(created_at) year, MONTH(created_at) month, COUNT(*) count"
		// 	))->
		// 	whereRaw("created_at <= NOW()")->
		// 	groupBy("year")->groupBy("month")->
		// 	orderBy("year", "ASC")->
		// 	orderBy("month", "ASC")->
		// 	take(6)->get();
			
		
		// // Fill with empty month
		// $blogposts_month_final = $this->postGraphFillMonth($blogposts_month);
		// $imageposts_month_final = $this->postGraphFillMonth($imageposts_month);
		// $subscriptions_month_final = $this->postGraphFillMonth($subscriptions_month);
		
			
		// return response()->json(
		// 	array(
		// 		"blogposts_month" => $blogposts_month_final,
		// 		"imageposts_month" => $imageposts_month_final,
		// 		"subscriptions_month" => $subscriptions_month_final,
		// 		"status" => 200
		// 	)
		// );
	}
	
	
	private function postGraphFillMonth($objects_month) {
		$objects_month_output = array();
		$last_year = (int) date("Y");
		$last_month = (int) date("n");
		
		/**
		 * If last month from database is not current month
		 * Fill current month and later in back of last month
		 */
		$objects_month_length = count($objects_month);
		
		if ($objects_month_length > 0) {
			for ($i = $objects_month_length-1; $i >= 0; $i--) {
				$month_diff = (12 * ($last_year - $objects_month[$i]->year)) + ($last_month - $objects_month[$i]->month);
				
				if ($month_diff != 0) {
					for ($j = $month_diff; $j > 0; $j--) {
						$values = (object) array(
							"count" => 0,
							"month" => $last_month,
							"year" => $last_year
						);
						
						array_push($objects_month_output, $values);
						
						$last_month--;
						if ($last_month == 0) {
							$last_year--;
							$last_month = 12;
						}
					}
				}
				
				array_push($objects_month_output, $objects_month[$i]);
				
				$last_month--;
				if ($last_month == 0) {
					$last_year--;
					$last_month = 12;
				}
			}
			
			if (count($objects_month_output) < 6) {
				$objects_month_output_length = count($objects_month_output);
				
				for ($i = $objects_month_output_length; $i < 6; $i++) {
					//Debugbar::info($objects_month_output);
					$month = $objects_month_output[$i-1]->month - 1;
					$year = $objects_month_output[$i-1]->year;
					
					if ($month == 0) {
						$year--;
						$month = 12;
					}
					
					$values = (object) array(
						"count" => 0,
						"month" => $month,
						"year" => $year
					);
					
					array_push($objects_month_output, $values);
				}
			}
		} else {
			for ($i =5; $i >= 0; $i--) {
				$values = (object) array(
					"count" => 0,
					"month" => $last_month,
					"year" => $last_year
				);
				
				array_push($objects_month_output, $values);
				
				$last_month--;
				if ($last_month == 0) {
					$last_year--;
					$last_month = 12;
				}
			}
		}
		
		return array_reverse(array_slice($objects_month_output, 0, 6));
	}
	// --------------------------------------Graph functions----------------------------------------
	

	public function editProfile()
	{
		$user = Auth::user();
		return view("admin.edit-profile", array("user" => $user));
	}
	
	
	public function updateProfile()
	{
		$input = Request::all();
		$user = Auth::user();
		
		// Change password case
		if (Request::input("password") != null && Request::input("password") != "") {
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
			$user->realname = trim(Request::input('realname'));
			$user->info = trim(Request::input('info'));
			$user->profile_image = trim(Request::input("profile_image"));
			
            $user->save();
            
            return Redirect::route('admin-profile-edit')->with('success', 'Your edited profile was saved');
        } else {
            return Redirect::back()->with('error', 'Errors')->withErrors($validator)->withInput();
        }
	}


	// ----------------------------------------File manager----------------------------------------
	public function fileManager()
	{
		return view("admin.filemanager");
	}
	
	// ----------------------------------------File manager----------------------------------------
	
}
