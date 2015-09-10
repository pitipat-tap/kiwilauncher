<?php namespace App\Http\Controllers;

use Request;
use Validator;
use Auth;
use Redirect;
use Input;
use DB;

use App\Models\User;
use App\Models\work\Post;
use App\Models\work\Screenshot;
use App\Models\work\Categories;
use App\Models\work\PostCategories;

class AdminWorkController extends Controller {
	
	// // ----------------------------------------Blog Posts----------------------------------------
	public function workPosts()
	{
		$q = Request::input("q");
		$status = Request::input("status");
		$author = Request::input("author");
		//$tag = Request::input("tag");
		
		$posts = null;
		 
		if ($status != null) {
			$posts = Post::where("status", "=", $status)->
				orderBy('is_featured', 'DESC')->
				paginate(20);
		}
		elseif ($q != null && trim($q) != "") {
			$posts = Post::where("title", "LIKE", "%".$q."%")->
				orderBy('is_featured', 'DESC')->
				paginate(20);
		}
		elseif ($author != null) {
			$posts = Post::whereHas("author", function($query) {
				$query->where("username", "=", Request::input("author"));
			})->orderBy('is_featured', 'DESC')->paginate(20);
		}
		else {
			$posts = Post::orderBy('is_featured', 'DESC')->paginate(20);
		}
		
		return view("admin.workPosts", array("posts" => $posts));
	}
	
	
	public function previewWorkPost($id)
	{
		$post = Post::find($id);
		if (!$post) Redirect::route("adminWorkPosts");
		
		return view("admin.workPostPreview", array("post" => $post));
	}
    
    public function livePreviewWorkPost()
    {
        $post = array();
        $post["title"] = Request::input("title");
        $post["description"] = Request::input("description");
        $post["link_url"] = Request::input("link_url");
        $post["feature_image_url"] = Request::input("feature_url");
        for($i=0; $i<5; $i++){
        	$post["screenshotsURL".$i] = Request::input("screenshotsURL".$i);
        }
        return view("admin.workPostLivePreview", array("post" => $post));
    }
	
	
	public function newWorkPost()
	{
		$allCategory = Categories::all();
		return view("admin.workPostNew",
	    array(
            "allCategory" => $allCategory 
        ));
}
	
	
	public function createworkPost()
	{
		$validator = Validator::make(Request::all(), Post::save_rules(), Post::$custom_messages);
		
		if ($validator->passes()) {
			$post = new Post;
			$post->author()->associate(Auth::user());
			$post->title = trim(Request::input("title"));
			$post->url = trim(Request::input("url"));
			$post->link_url = trim(Request::input("link_url"));
			$post->feature_image_url = trim(Request::input("feature_image_url"));
			$post->description = trim(Request::input("description"));
			$post->status = Request::input("status");
			
			if ($post->save()) {

	        	$categorys = Categories::all();
	        	foreach ($categorys as $category) {
	        		if (Input::get($category->name)) {
						$postCategories = new PostCategories;
						$postCategories->posts()->associate($post);
						$postCategories->categories()->associate($category);
						$postCategories->save();    
					}
	        	}

				for($i=0; $i<5; $i++){
					$image_url = trim(Request::input("screenshots_URL".$i));
					if($image_url != null && $image_url != ''){
						$newScreenshot = new Screenshot;
						$newScreenshot->posts()->associate($post);
						$newScreenshot->image_url = $image_url;
						$newScreenshot->save();
					}	
				}

				return Redirect::route("adminWorkPosts")->with("success", json_encode("New work post was created"));
			} 
			else {
				return Redirect::back()->with('error', 'Cannot save data')->withInput(Request::except("feature_image_url"));
			}
		}
		else {
			return Redirect::back()->with('error', 'Errors')->withErrors($validator)->withInput(Request::except("feature_image_url"));
		}
		
	}


	public function editWorkPost($id)
	{
		// Check is exist
		$post = Post::find($id);
		if (!$post) return Redirect::route("adminWorkPosts");
		
		// Check if not admin role, and not author's item
		if (Auth::user()->role != "admin" && Auth::user()->id != $post->author->id) {
			return Redirect::route("adminWorkPosts");
		}

		$allCategory = Categories::orderBy('id', 'ASC')->get();
		$oldCategories = PostCategories::where('work_id', $id)->orderBy('categories_id', 'ASC')->get();
		$i = 0;
		foreach ($allCategory as $category ){
			if ($i >= sizeof($oldCategories)){
				$category->isPost = FALSE;
			}
			elseif($category->id == $oldCategories[$i]->categories_id){
				$category->isPost = TRUE;
				$i++;
			}
			else{
				$category->isPost = FALSE;	
			}
		}

		$oldScreenShots = Screenshot::where('work_id', $id)->get();
		
		return view("admin.workPostEdit", 
		    array(
                "post" => $post,
                "allCategory" => $allCategory,
                "oldScreenShots" => $oldScreenShots
            )
        );
	}
	
	
	public function updateWorkPost($id)
	{
		// Check is exist
		$post = Post::find($id);
		if (!$post) return Redirect::route("adminWorkPosts")->with('error', 'Cannot save data');
		
		// Check if not admin role, and not author's item
		if (Auth::user()->role != "admin" && Auth::user()->id != $post->author->id) {
			return Redirect::route("adminWorkPosts")->with('error', 'Cannot save data');
		}
		
		$validator = Validator::make(Request::all(), Post::save_rules($id), Post::$custom_messages);
		
		if ($validator->passes()) {
	        $post->title = trim(Request::input("title"));
			$post->url = trim(Request::input("url"));
			$post->link_url = trim(Request::input("link_url"));
			$post->feature_image_url = trim(Request::input("feature_image_url"));
			$post->description = trim(Request::input("description"));
			$post->status = Request::input("status");
			
	        if ($post->save()) {

	        	PostCategories::where('work_id','=', $id)->delete(); // delete old Categories
	        	$categorys = Categories::all();
	        	foreach ($categorys as $category) {
	        		if (Input::get($category->name)) {
						$postCategories = new PostCategories;
						$postCategories->posts()->associate($post);
						$postCategories->categories()->associate($category);
						$postCategories->save();    
					}
	        	}

	        	Screenshot::where('work_id','=', $id)->delete();
				for($i=0; $i<5; $i++){
					$image_url = trim(Request::input("screenshots_URL".$i));
					if($image_url != null && $image_url != ''){
						$newScreenshot = new Screenshot;
						$newScreenshot->posts()->associate($post);
						$newScreenshot->image_url = $image_url;
						$newScreenshot->save();
					}	
				}
				
	            return Redirect::route("adminWorkPosts")->with("success", "Updated work post was saved");
	        } else {
	            return Redirect::back()->with('error', 'Cannot save data')->withInput(Request::except("feature_image_url"));;
	        }
		}
		else {
            return Redirect::back()->with('error', 'Errors')->withErrors($validator)->withInput(Request::except("feature_image_url"));;
        }
	}


	public function deleteWorkPost($id)
	{
		// Check is exist
		$post = Post::find($id);
		if (!$post) return Redirect::route("adminWorkPosts")->with('error', 'Cannot delete data');
		
		// Check if not admin role, and not author's item
		if (Auth::user()->role != "admin" && Auth::user()->id != $post->author->id) {
			return Redirect::route("adminWorkPosts")->with('error', 'Cannot delete data');
		}
		
		// $post->tags()->detach();
		$post->delete();
		
		if (Request::input("inpreview")) 
			return Redirect::route("adminWorkPosts")->with("success", "Post was deleted");
		return Redirect::back()->with("success", "Post was deleted");
	}
	
	
	public function toggleFeaturedWorkPost($id)
	{
		// Check is exist
		$post = Posts::find($id);
		if (!$post) return Redirect::route("adminWorkPosts")->with('error', 'Cannot save data');
		
		$message = "Success";
		
		if (!$post->is_featured) {
			$post->is_featured = 1;
			$message = "Set featured post";
		} else {
			$post->is_featured = 0;
			$message = "Unset featured post";
		}
		
		if ($post->save()) {
			return Redirect::back()->with("success", $message);
		} else {
			return Redirect::back()->with('error', 'Cannot delete data');
		}
	}
	// ----------------------------------------Blog Posts----------------------------------------
}
