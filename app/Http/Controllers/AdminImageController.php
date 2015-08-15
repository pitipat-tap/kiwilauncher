<?php namespace App\Http\Controllers;

use Request;
use Validator;
use Auth;
use Redirect;

use App\Models\User;
use App\Models\ImagePost;
use App\Models\ImageTag;

class AdminImageController extends Controller {
	
	// ----------------------------------------Image Posts----------------------------------------
	public function imagePosts()
	{
		$tag = Request::input("tag");
		$author = Request::input("author");
		
		$posts = null;
		
		if ($tag != null) {
			$posts = ImagePost::whereHas("tags", function($query) {
				$query->where("name", "=", Request::input("tag"));
			})->orderBy('is_featured', 'DESC')->orderBy('created_at', 'DESC')->paginate(20);
		}
		elseif ($author != null) {
			$posts = ImagePost::whereHas("author", function($query) {
				$query->where("username", "=", Request::input("author"));
			})->orderBy('is_featured', 'DESC')->orderBy('created_at', 'DESC')->paginate(20);
		}
		else {
			$posts = ImagePost::orderBy('is_featured', 'DESC')->orderBy('created_at', 'DESC')->paginate(20);
		}
		
		return view("admin.imagePosts", array("posts" => $posts));
	}

	
	public function newImagePost()
	{
		return view("admin.imagePostNew");
	}
	
	
	public function createImagePost()
	{
		$validator = Validator::make(Request::all(), ImagePost::$save_rules, ImagePost::$custom_messages);
		
		if ($validator->passes()) {
			// Generate random url & check is exist
			$url = str_random(10);
			$flag = false;
			while (!$flag) {
				$exist_post = ImagePost::where("url", "=", $url)->first();
				if ($exist_post == null) $flag = true;
				else $url = str_random(10);
			}
			
			$post = new ImagePost;
			$post->author()->associate(Auth::user());
			$post->url = $url;
			$post->image_url = trim(Request::input("image_url"));
			$caption = trim(Request::input("caption"));
			$post->caption = $caption;
			
			if ($post->save()) {
				$tags = $this->hashtagDetect($caption);
				$tags_id = array();
				if (count($tags) > 0) {
					foreach ($tags as $tag_name) {
						$tag_name = str_replace("#", "", $tag_name);
						$tag = ImageTag::where("name", "=", trim($tag_name))->first();
						if ($tag == null) {
							$tag = new ImageTag;
							$tag->name = trim($tag_name);
							$tag->save();
						}
						array_push($tags_id, $tag->id);
					}
					$post->tags()->sync($tags_id);
				}
				
				return Redirect::route("adminImagePosts")->with("success", "New post was created");
			} else {
				return Redirect::back()->with('error', 'Cannot save data')->withInput(Request::except("image_url"));
			}
		}
		else {
			return Redirect::back()->with('error', 'Errors')->withErrors($validator)->withInput(Request::except("image_url"));
		}
	}


	public function editImagePost($id)
	{
		// Check is exist
		$post = ImagePost::find($id);
		if (!$post) return Redirect::route("adminImagePosts");
		
		// Check if not admin role, and not author's item
		if (Auth::user()->role != "admin" && Auth::user()->id != $post->author->id) {
			return Redirect::route("adminImagePosts");
		}
		
		return view("admin.imagePostEdit", 
		    array(
                "post" => $post
            )
        );
	}
	
	
	public function updateImagePost($id)
	{
		// Check is exist
		$post = ImagePost::find($id);
		if (!$post) return Redirect::route("adminImagePosts")->with('error', 'Cannot save data');
		
		// Check if not admin role, and not author's item
		if (Auth::user()->role != "admin" && Auth::user()->id != $post->author->id) {
			return Redirect::route("adminImagePosts")->with('error', 'Cannot save data');
		}
		
		$caption = trim(Request::input("caption"));
		$post->caption = $caption;
			
        if ($post->save()) {
        	$tags = $this->hashtagDetect($caption);
			$tags_id = array();
			if (count($tags) > 0) {
				foreach ($tags as $tag_name) {
					$tag_name = str_replace("#", "", $tag_name);
					$tag = ImageTag::where("name", "=", trim($tag_name))->first();
					if ($tag == null) {
						$tag = new ImageTag;
						$tag->name = trim($tag_name);
						$tag->save();
					}
					array_push($tags_id, $tag->id);
				}
				$post->tags()->sync($tags_id);
			}
			
			return Redirect::route("adminImagePosts")->with("success", "Updated post was saved");
        } else {
            return Redirect::back()->with('error', 'Cannot save data')->withInput();;
        }
	}


	public function deleteImagePost($id)
	{
		// Check is exist
		$post = ImagePost::find($id);
		if (!$post) return Redirect::back()->with('error', 'Cannot delete data');
		
		// Check if not admin role, and not author's item
		if (Auth::user()->role != "admin" && Auth::user()->id != $post->author->id) {
			return Redirect::back()->with('error', 'Cannot delete data');
		}
		
		$post->tags()->detach();
		$post->delete();
		
		return Redirect::back()->with('success', 'Post was deleted');
	}
	
	
	public function toggleFeaturedImagePost($id)
	{
		// Check is exist
		$post = ImagePost::find($id);
		if (!$post) return Redirect::route("adminImagePosts")->with('error', 'Cannot save data');
		
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
	// ----------------------------------------Image Posts----------------------------------------
	
	
	// ----------------------------------------Image Tags----------------------------------------
	public function ImageTags() {
		$q = Request::input("q");
        
        $tags = null;

        if ($q != null && trim($q) != "") {
            $tags = ImageTag::where("name", "LIKE", "%".$q."%")->
            	orderBy('is_featured', 'DESC')->
                orderBy('created_at', 'DESC')->
                paginate(20);
        }
        else {
            $tags = ImageTag::orderBy('is_featured', 'DESC')->orderBy('created_at', 'DESC')->paginate(20);
        }
		
		return view("admin.imageTags", array("tags" => $tags));
	}
	
	
	public function deleteImageTag($id)
	{
		// Check is exist
		$tag = ImageTag::find($id);
		if (!$tag) return Redirect::back()->with('error', 'Cannot delete data');
		
		$tag->posts()->detach();
		$tag->delete();
		
		return Redirect::back();
	}
	
	
	public function toggleFeaturedImageTag($id)
	{
		// Check is exist
		$tag = ImageTag::find($id);
		if (!$tag) return Redirect::route("adminImageTags")->with('error', 'Cannot save data');
		
		$message = "Success";
		
		if (!$tag->is_featured) {
			$tag->is_featured = 1;
			$message = "Set featured tag";
		} else {
			$tag->is_featured = 0;
			$message = "Unset featured tag";
		}
		
		if ($tag->save()) {
			return Redirect::back()->with("success", $message);
		} else {
			return Redirect::back()->with('error', 'Cannot delete data');
		}
	}
	
	
	private function hashtagDetect($caption)
	{
		preg_match_all("/(#[\wก-๙]+)/", $caption, $matches);
		return $matches[0];
	}
	// ----------------------------------------Image Tags----------------------------------------
	
}
