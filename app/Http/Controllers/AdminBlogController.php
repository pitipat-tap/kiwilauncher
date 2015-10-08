<?php namespace App\Http\Controllers;

use Request;
use Validator;
use Auth;
use Redirect;

use App\Models\User;
use App\Models\BlogPost;
use App\Models\BlogTag;

class AdminBlogController extends Controller {
	
	// ----------------------------------------Blog Posts----------------------------------------
	public function blogPosts()
	{
		$q = Request::input("q");
		$status = Request::input("status");
		$author = Request::input("author");
		$tag = Request::input("tag");
		
		$posts = null;
		 
		if ($status != null) {
			$posts = BlogPost::where("status", "=", $status)->
				orderBy('is_featured', 'DESC')->
				orderBy('created_at', 'DESC')->
				paginate(20);
		}
		elseif ($q != null && trim($q) != "") {
			$posts = BlogPost::where("title", "LIKE", "%".$q."%")->
				orderBy('is_featured', 'DESC')->
				orderBy('created_at', 'DESC')->
				paginate(20);
		}
		elseif ($tag != null) {
			$posts = BlogPost::whereHas("tags", function($query) {
				$query->where("name", "=", Request::input("tag"));
			})->orderBy('is_featured', 'DESC')->orderBy('created_at', 'DESC')->paginate(20);
		}
		elseif ($author != null) {
			$posts = BlogPost::whereHas("author", function($query) {
				$query->where("username", "=", Request::input("author"));
			})->orderBy('is_featured', 'DESC')->orderBy('created_at', 'DESC')->paginate(20);
		}
		else {
			$posts = BlogPost::orderBy('is_featured', 'DESC')->orderBy('created_at', 'DESC')->paginate(20);
		}
		
		return view("admin.blog-posts", array("posts" => $posts));
	}
	
	
	public function previewBlogPost($id)
	{
		$post = BlogPost::find($id);
		if (!$post) Redirect::route("admin-blog-posts");
		
		return view("admin.blog-post-preview", array("post" => $post));
	}
    
    public function livePreviewBlogPost()
    {
        $post = array();
        $post["title"] = Request::input("title");
        $post["content"] = Request::input("content");
        return view("admin.blog-post-livepreview", array("post" => $post));
    }
	
	
	public function newBlogPost()
	{
		return view("admin.blog-post-new");
	}
	
	
	public function createBlogPost()
	{
		$validator = Validator::make(Request::all(), BlogPost::save_rules(), BlogPost::$custom_messages);
		
		if ($validator->passes()) {
			$post = new BlogPost;
			$post->author()->associate(Auth::user());
			$post->title = trim(Request::input("title"));
			$post->url = trim(Request::input("url"));
			$post->feature_image_url = trim(Request::input("feature_image_url"));
			$post->description = trim(Request::input("description"));
			$post->content = Request::input("content");
			$post->status = Request::input("status");
			
			if ($post->save()) {
				$tags = Request::input("tags");
				$tags_id = array();
				if (trim($tags) != "") {
					$tags = preg_replace('/\s+/', ' ', trim($tags));
					$tags_array = explode(" ", $tags);
					foreach ($tags_array as $tag_name) {
						$tag = BlogTag::where("name", "=", trim($tag_name))->first();
						if ($tag == null) {
							$tag = new BlogTag;
							$tag->name = trim($tag_name);
							$tag->save();
						}
						array_push($tags_id, $tag->id);
					}
					$post->tags()->sync($tags_id);
				}
				
				return Redirect::route("admin-blog-posts")->with("success", "New post was created");
			} else {
				return Redirect::back()->with('error', 'Cannot save data')->withInput(Request::except("feature_image_url"));
			}
		}
		else {
			return Redirect::back()->with('error', 'Errors')->withErrors($validator)->withInput(Request::except("feature_image_url"));
		}
	}


	public function editBlogPost($id)
	{
		// Check is exist
		$post = BlogPost::find($id);
		if (!$post) return Redirect::route("admin-blog-posts");
		
		// Check if not admin role, and not author's item
		if (Auth::user()->role != "admin" && Auth::user()->id != $post->author->id) {
			return Redirect::route("admin-blog-posts");
		}
		
		$tags_str = "";
		foreach ($post->tags as $tag) {
			$tags_str.=$tag->name." ";
		}
		
		return view("admin.blog-post-edit", 
		    array(
                "post" => $post, 
                "tags_str" => $tags_str
            )
        );
	}
	
	
	public function updateBlogPost($id)
	{
		// Check is exist
		$post = BlogPost::find($id);
		if (!$post) return Redirect::route("admin-blog-posts")->with('error', 'Cannot save data');
		
		// Check if not admin role, and not author's item
		if (Auth::user()->role != "admin" && Auth::user()->id != $post->author->id) {
			return Redirect::route("admin-blog-posts")->with('error', 'Cannot save data');
		}
		
		$validator = Validator::make(Request::all(), BlogPost::save_rules($id), BlogPost::$custom_messages);
		
		if ($validator->passes()) {
	        $post->title = trim(Request::input("title"));
			$post->url = trim(Request::input("url"));
	        $post->feature_image_url = trim(Request::input("feature_image_url"));
	        $post->description = trim(Request::input("description"));
	        $post->content = Request::input("content");
			$post->status = Request::input("status");
			
	        if ($post->save()) {
	        	$tags = Request::input("tags");
	        	$tags_id = array();
				if (trim($tags) != "") {
					$tags = preg_replace('/\s+/', ' ', trim($tags));
					$tags_array = explode(" ", $tags);
					foreach ($tags_array as $tag_name) {
						$tag = BlogTag::where("name", "=", trim($tag_name))->first();
						if ($tag == null) {
							$tag = new BlogTag;
							$tag->name = trim($tag_name);
							$tag->save();
						}
						array_push($tags_id, $tag->id);
					}
					$post->tags()->sync($tags_id);
				}

				$graph = 'https://graph.facebook.com/';
				$post = 'id='.urlencode('http://$_SERVER[HTTP_HOST]/blog/'.$post->url).'&scrape=true';
				$r = curl_init();
				curl_setopt($r, CURLOPT_URL, $graph);
				curl_setopt($r, CURLOPT_POST, 1);
				curl_setopt($r, CURLOPT_POSTFIELDS, $post);
				curl_setopt($r, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($r, CURLOPT_CONNECTTIMEOUT, 5);
				$data = curl_exec($r);
				curl_close($r);
				
	            return Redirect::route("admin-blog-posts")->with("success", "Updated post was saved");
	        } else {
	            return Redirect::back()->with('error', 'Cannot save data')->withInput(Request::except("feature_image_url"));;
	        }
		}
		else {
            return Redirect::back()->with('error', 'Errors')->withErrors($validator)->withInput(Request::except("feature_image_url"));;
        }
	}


	public function deleteBlogPost($id)
	{
		// Check is exist
		$post = BlogPost::find($id);
		if (!$post) return Redirect::route("admin-blog-posts")->with('error', 'Cannot delete data');
		
		// Check if not admin role, and not author's item
		if (Auth::user()->role != "admin" && Auth::user()->id != $post->author->id) {
			return Redirect::route("admin-blog-posts")->with('error', 'Cannot delete data');
		}
		
		$post->tags()->detach();
		$post->delete();
		
		if (Request::input("inpreview")) return Redirect::route("admin-blog-posts")->with("success", "Post was deleted");
		return Redirect::back()->with("success", "Post was deleted");
	}
	
	
	public function toggleFeaturedBlogPost($id)
	{
		// Check is exist
		$post = BlogPost::find($id);
		if (!$post) return Redirect::route("admin-blog-posts")->with('error', 'Cannot save data');
		
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
	
	
	// ----------------------------------------Blog Tags----------------------------------------
	public function blogTags() {
		$q = Request::input("q");
        
        $tags = null;

        if ($q != null && trim($q) != "") {
            $tags = BlogTag::where("name", "LIKE", "%".$q."%")->
            	orderBy('is_featured', 'DESC')->
                orderBy('created_at', 'DESC')->
                paginate(20);
        }
        else {
            $tags = BlogTag::orderBy('is_featured', 'DESC')->orderBy('created_at', 'DESC')->paginate(20);
        }
		
		return view("admin.blog-tags", array("tags" => $tags));
	}
	
	
	public function deleteBlogTag($id)
	{
		// Check is exist
		$tag = BlogTag::find($id);
		if (!$tag) return Redirect::back()->with('error', 'Cannot delete data');
		
		$tag->posts()->detach();
		$tag->delete();
		
		return Redirect::back()->with("success", "Tag was deleted");
	}
	
	
	public function toggleFeaturedBlogTag($id)
	{
		// Check is exist
		$tag = BlogTag::find($id);
		if (!$tag) return Redirect::route("admin-blog-tags")->with('error', 'Cannot save data');
		
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
	// ----------------------------------------Blog Tags----------------------------------------
	
}
