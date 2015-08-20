<?php namespace App\Http\Controllers;

use Request;
use Validator;
use Redirect;
use Mail;

use App\Models\BlogPost;
use App\Models\ImagePost;
use App\Models\Faq;
use App\Models\Subscription;

class WebController extends Controller {
	
	public function index()
	{
		return view('web.index');
	}
    
    public function skills()
	{
		return view('web.skills');
	}
    
    public function works()
	{
		return view('web.works');
	}
    
    public function blog()
	{
        $posts = BlogPost::orderBy('created_at', 'DESC')->
            paginate(20);
		return view('web.blog', array("posts" => $posts));
	}
    
    public function contact()
	{
		return view('web.contact');
	}

    public function galleryPost($url)
    {
        $post = ImagePost::where("url", "=", $url)->first();
        if (!$post) App::abort(404);
        
        $post->hits += 1;
        $post->timestamps = false;
        $post->save();
        
        $prev_post = ImagePost::where("created_at", ">", $post->created_at)->orderBy("created_at", "ASC")->first();
        $next_post = ImagePost::where("created_at", "<", $post->created_at)->orderBy("created_at", "DESC")->first();
        
        return view("web.gallery_post", array(
                "post" => $post,
                "prev_post" => $prev_post,
                "next_post" => $next_post
            )
        );
    }
    
    
    public function galleryPostAjax($url)
    {
        $post = ImagePost::where("url", "=", $url)->first();
        if (!$post) {
            return response()->json(
                array(
                    "message" => "Object not found",
                    "status" => 404
                )
            );
        }
        
        $post->hits += 1;
        $post->timestamps = false;
        $post->save();
        
        return response()->json(
            array(
                "post" => $post,
                "status" => 200
            )
        );
    }
}
