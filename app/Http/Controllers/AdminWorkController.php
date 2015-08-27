<?php namespace App\Http\Controllers;

use Request;
use Validator;
use Auth;
use Redirect;
use Input;

use App\Models\User;
use App\Models\work\WorkPost;
use App\Models\work\WorkImage;
use App\Models\work\WorkCategories;

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
			$posts = WorkPost::where("status", "=", $status)->
				orderBy('is_featured', 'DESC')->
				paginate(20);
		}
		elseif ($q != null && trim($q) != "") {
			$posts = WorkPost::where("title", "LIKE", "%".$q."%")->
				orderBy('is_featured', 'DESC')->
				paginate(20);
		}
		elseif ($author != null) {
			$posts = WorkPost::whereHas("author", function($query) {
				$query->where("username", "=", Request::input("author"));
			})->orderBy('is_featured', 'DESC')->paginate(20);
		}
		else {
			$posts = WorkPost::orderBy('is_featured', 'DESC')->paginate(20);
		}
		
		return view("admin.workPosts", array("posts" => $posts));
	}
	
	
	public function previewWorkPost($id)
	{
		$post = WorkPost::find($id);
		if (!$post) Redirect::route("adminWorkPosts");
		
		return view("admin.workPostPreview", array("post" => $post));
	}
    
    public function livePreviewWorkPost()
    {
        $post = array();
        $post["title"] = Request::input("title");
        $post["description"] = Request::input("description");
        $post["feature_image_url"] = Request::input("feature_url");
        return view("admin.workPostLivePreview", array("post" => $post));
    }
	
	
	public function newWorkPost()
	{
		$categorys = WorkCategories::all();
		return view("admin.workPostNew",
	    array(
            "categorys" => $categorys
        ));
}
	
	
	public function createworkPost()
	{
		$validator = Validator::make(Request::all(), WorkPost::save_rules(), WorkPost::$custom_messages);
		
		if ($validator->passes()) {
			$post = new WorkPost;
			$post->author()->associate(Auth::user());
			$post->title = trim(Request::input("title"));
			$post->url = trim(Request::input("url"));
			$post->link_url = trim(Request::input("link_url"));
			$post->feature_image_url = trim(Request::input("feature_image_url"));
			$post->description = trim(Request::input("description"));
			$post->status = Request::input("status");
			
			if ($post->save()) {

				$categorys_id = array();
	        	$categorys = WorkCategories::all();
	        	foreach ($categorys as $category) {
	        		if (Input::get($category->name)) {
					    $categories = WorkCategories::where("name", "=", $category->name )->first();
					    array_push($categorys_id, $categories->id);
					} 
	        	}
	        	$post->categories()->sync($categorys_id);

				$i=0;
				$image_url = trim(Request::input("screenshots_URL".$i));
				while($image_url != null && $image_url != ''){
					$newImage = new WorkImage;
					$newImage->posts()->associate($post);
					$newImage->image_url = $image_url;
					$newImage->save();
					$i++;
					$image_url = trim(Request::input("screenshots_URL".$i));
				}

				return Redirect::route("adminWorkPosts")->with("success", json_encode($categorys_id));
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
		$post = WorkPost::find($id);
		if (!$post) return Redirect::route("adminWorkPosts");
		
		// Check if not admin role, and not author's item
		if (Auth::user()->role != "admin" && Auth::user()->id != $post->author->id) {
			return Redirect::route("adminWorkPosts");
		}

		$categorys = WorkCategories::all();
		
		return view("admin.workPostEdit", 
		    array(
                "post" => $post,
                "categorys" => $categorys
            )
        );
	}
	
	
	public function updateWorkPost($id)
	{
		// Check is exist
		$post = WorkPost::find($id);
		if (!$post) return Redirect::route("adminWorkPosts")->with('error', 'Cannot save data');
		
		// Check if not admin role, and not author's item
		if (Auth::user()->role != "admin" && Auth::user()->id != $post->author->id) {
			return Redirect::route("adminWorkPosts")->with('error', 'Cannot save data');
		}
		
		$validator = Validator::make(Request::all(), WorkPost::save_rules($id), WorkPost::$custom_messages);
		
		if ($validator->passes()) {
	        $post->title = trim(Request::input("title"));
			$post->url = trim(Request::input("url"));
			$post->link_url = trim(Request::input("link_url"));
			$post->feature_image_url = trim(Request::input("feature_image_url"));
			$post->description = trim(Request::input("description"));
			$post->status = Request::input("status");
			
	        if ($post->save()) {



	        	$categorys_id = array();
	        	$categorys = WorkCategories::all();
	        	foreach ($categorys as $category) {
	        		if (Input::get($category->name) == 'yes') {
					    $categories = WorkCategories::where("name", "=", $category->name )->first();
					    array_push($categorys_id, $categories->id);
					} 
	        	}
	        	$post->categories()->sync($categorys_id);
	        	
	   //      	$tags = Request::input("tags");
	   //      	$tags_id = array();
				// if (trim($tags) != "") {
				// 	$tags = preg_replace('/\s+/', ' ', trim($tags));
				// 	$tags_array = explode(" ", $tags);
				// 	foreach ($tags_array as $tag_name) {
				// 		$tag = BlogTag::where("name", "=", trim($tag_name))->first();
				// 		if ($tag == null) {
				// 			$tag = new BlogTag;
				// 			$tag->name = trim($tag_name);
				// 			$tag->save();
				// 		}
				// 		array_push($tags_id, $tag->id);
				// 	}
				// 	$post->tags()->sync($tags_id);
				// }
				
	            return Redirect::route("adminWorkPosts")->with("success", "Updated post was saved");
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
		$post = WorkPost::find($id);
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
		$post = WorkPosts::find($id);
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
