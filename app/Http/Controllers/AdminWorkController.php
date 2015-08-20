<?php namespace App\Http\Controllers;

use Request;
use Validator;
use Auth;
use Redirect;

use App\Models\User;
use App\Models\WorkPost;
use App\Models\WorkImage;

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
	
	
	// public function previewBlogPost($id)
	// {
	// 	$post = BlogPost::find($id);
	// 	if (!$post) Redirect::route("adminBlogPosts");
		
	// 	return view("admin.blogPostPreview", array("post" => $post));
	// }
    
 //    public function livePreviewBlogPost()
 //    {
 //        $post = array();
 //        $post["title"] = Request::input("title");
 //        $post["content"] = Request::input("content");
 //        return view("admin.blogpostLivePreview", array("post" => $post));
 //    }
	
	
	public function newWorkPost()
	{
		return view("admin.workPostNew");
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
				// $tags = Request::input("tags");
				// $tags_id = array();
				// if (trim($tags) != "") {
				// 	$tags = preg_replace('/\s+/', ' ', trim($tags));
				// 	$tags_array = explode(" ", $tags);
				// 	// จะเปลี่นเป็น วนลูป save รูป
				// 	// foreach ($tags_array as $tag_name) {
				// 	// 	$tag = BlogTag::where("name", "=", trim($tag_name))->first();
				// 	// 	if ($tag == null) {
				// 	// 		$tag = new BlogTag;
				// 	// 		$tag->name = trim($tag_name);
				// 	// 		$tag->save();
				// 	// 	}
				// 	// 	array_push($tags_id, $tag->id);
				// 	// }
				// 	// $post->tags()->sync($tags_id);
				// }
			} 
			else {
				return Redirect::back()->with('error', 'Cannot save data')->withInput(Request::except("feature_image_url"));
			}
		}
		else {
			return Redirect::back()->with('error', 'Errors')->withErrors($validator)->withInput(Request::except("feature_image_url"));
		}
		return Redirect::route("adminWorkPosts")->with("success", "New post was created");
	}


	// public function editBlogPost($id)
	// {
	// 	// Check is exist
	// 	$post = BlogPost::find($id);
	// 	if (!$post) return Redirect::route("adminBlogPosts");
		
	// 	// Check if not admin role, and not author's item
	// 	if (Auth::user()->role != "admin" && Auth::user()->id != $post->author->id) {
	// 		return Redirect::route("adminBlogPosts");
	// 	}
		
	// 	$tags_str = "";
	// 	foreach ($post->tags as $tag) {
	// 		$tags_str.=$tag->name." ";
	// 	}
		
	// 	return view("admin.blogPostEdit", 
	// 	    array(
 //                "post" => $post, 
 //                "tags_str" => $tags_str
 //            )
 //        );
	// }
	
	
	// public function updateBlogPost($id)
	// {
	// 	// Check is exist
	// 	$post = BlogPost::find($id);
	// 	if (!$post) return Redirect::route("adminBlogPosts")->with('error', 'Cannot save data');
		
	// 	// Check if not admin role, and not author's item
	// 	if (Auth::user()->role != "admin" && Auth::user()->id != $post->author->id) {
	// 		return Redirect::route("adminBlogPosts")->with('error', 'Cannot save data');
	// 	}
		
	// 	$validator = Validator::make(Request::all(), BlogPost::save_rules($id), BlogPost::$custom_messages);
		
	// 	if ($validator->passes()) {
	//         $post->title = trim(Request::input("title"));
	// 		$post->url = trim(Request::input("url"));
	//         $post->feature_image_url = trim(Request::input("feature_image_url"));
	//         $post->description = trim(Request::input("description"));
	//         $post->content = Request::input("content");
	// 		$post->status = Request::input("status");
			
	//         if ($post->save()) {
	//         	$tags = Request::input("tags");
	//         	$tags_id = array();
	// 			if (trim($tags) != "") {
	// 				$tags = preg_replace('/\s+/', ' ', trim($tags));
	// 				$tags_array = explode(" ", $tags);
	// 				foreach ($tags_array as $tag_name) {
	// 					$tag = BlogTag::where("name", "=", trim($tag_name))->first();
	// 					if ($tag == null) {
	// 						$tag = new BlogTag;
	// 						$tag->name = trim($tag_name);
	// 						$tag->save();
	// 					}
	// 					array_push($tags_id, $tag->id);
	// 				}
	// 				$post->tags()->sync($tags_id);
	// 			}
				
	//             return Redirect::route("adminBlogPosts")->with("success", "Updated post was saved");
	//         } else {
	//             return Redirect::back()->with('error', 'Cannot save data')->withInput(Request::except("feature_image_url"));;
	//         }
	// 	}
	// 	else {
 //            return Redirect::back()->with('error', 'Errors')->withErrors($validator)->withInput(Request::except("feature_image_url"));;
 //        }
	// }


	// public function deleteBlogPost($id)
	// {
	// 	// Check is exist
	// 	$post = BlogPost::find($id);
	// 	if (!$post) return Redirect::route("adminBlogPosts")->with('error', 'Cannot delete data');
		
	// 	// Check if not admin role, and not author's item
	// 	if (Auth::user()->role != "admin" && Auth::user()->id != $post->author->id) {
	// 		return Redirect::route("adminBlogPosts")->with('error', 'Cannot delete data');
	// 	}
		
	// 	$post->tags()->detach();
	// 	$post->delete();
		
	// 	if (Request::input("inpreview")) return Redirect::route("adminBlogPosts")->with("success", "Post was deleted");
	// 	return Redirect::back()->with("success", "Post was deleted");
	// }
	
	
	// public function toggleFeaturedBlogPost($id)
	// {
	// 	// Check is exist
	// 	$post = BlogPost::find($id);
	// 	if (!$post) return Redirect::route("adminBlogPosts")->with('error', 'Cannot save data');
		
	// 	$message = "Success";
		
	// 	if (!$post->is_featured) {
	// 		$post->is_featured = 1;
	// 		$message = "Set featured post";
	// 	} else {
	// 		$post->is_featured = 0;
	// 		$message = "Unset featured post";
	// 	}
		
	// 	if ($post->save()) {
	// 		return Redirect::back()->with("success", $message);
	// 	} else {
	// 		return Redirect::back()->with('error', 'Cannot delete data');
	// 	}
	// }
	// // ----------------------------------------Blog Posts----------------------------------------
	
	
	// // ----------------------------------------Blog Tags----------------------------------------
	// public function blogTags() {
	// 	$q = Request::input("q");
        
 //        $tags = null;

 //        if ($q != null && trim($q) != "") {
 //            $tags = BlogTag::where("name", "LIKE", "%".$q."%")->
 //            	orderBy('is_featured', 'DESC')->
 //                orderBy('created_at', 'DESC')->
 //                paginate(20);
 //        }
 //        else {
 //            $tags = BlogTag::orderBy('is_featured', 'DESC')->orderBy('created_at', 'DESC')->paginate(20);
 //        }
		
	// 	return view("admin.blogtags", array("tags" => $tags));
	// }
	
	
	// public function deleteBlogTag($id)
	// {
	// 	// Check is exist
	// 	$tag = BlogTag::find($id);
	// 	if (!$tag) return Redirect::back()->with('error', 'Cannot delete data');
		
	// 	$tag->posts()->detach();
	// 	$tag->delete();
		
	// 	return Redirect::back()->with("success", "Tag was deleted");
	// }
	
	
	// public function toggleFeaturedBlogTag($id)
	// {
	// 	// Check is exist
	// 	$tag = BlogTag::find($id);
	// 	if (!$tag) return Redirect::route("adminBlogTags")->with('error', 'Cannot save data');
		
	// 	$message = "Success";
		
	// 	if (!$tag->is_featured) {
	// 		$tag->is_featured = 1;
	// 		$message = "Set featured tag";
	// 	} else {
	// 		$tag->is_featured = 0;
	// 		$message = "Unset featured tag";
	// 	}
		
	// 	if ($tag->save()) {
	// 		return Redirect::back()->with("success", $message);
	// 	} else {
	// 		return Redirect::back()->with('error', 'Cannot delete data');
	// 	}
	// }
	// // ----------------------------------------Blog Tags----------------------------------------
	
}
