<?php namespace App\Http\Controllers;

use Request;
use Validator;
use Redirect;
use Mail;

use App\Models\BlogPost;
use App\Models\ImagePost;
use App\Models\Faq;
use App\Models\Subscription;

use App\Models\work\Post;
use App\Models\work\Categories;
use App\Models\work\PostCategories;
use App\Models\work\Screenshot;

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
        $works = Post::where("status", "published")->orderBy("id", "ASC")->get();
        foreach ($works as $work) {
            $work->categories = Categories::join('work_post_categories', 'work_categories.id', '=', 'work_post_categories.categories_id')
                                ->where('work_id',$work->id)->get();
        }
		return view('web.works',
            array("works" => $works));
	}

    public function workPost($url)
    {
        $post = Post::where("url", $url)->first();
        if (!$post){
            App::abort(404);
        }
        $post->hits += 1;
        $post->timestamps = false;
        $post->save();
        
        $screenshots = Screenshot::where("work_id", $post->id)->get();

        $categories = Categories::join('work_post_categories', 'work_categories.id', '=', 'work_post_categories.categories_id')
                                ->where('work_id',$post->id)->get();

        return view("web.work-post", array(
                "post" => $post,
                "screenshots" => $screenshots,
                "categories" => $categories
            )
        );
    }

    public function works_drseoul()
	{
		return view('web.work-drseoul');
	}
    
    public function blog()
	{
        $posts = BlogPost::orderBy('created_at', 'DESC')->
            paginate(20);
		return view('web.blog', array("posts" => $posts));
	}

    public function blogPost($url)
    {
        $post = BlogPost::where("url", "=", $url)->first();
        if (!$post) App::abort(404);
        
        $post->hits += 1;
        $post->timestamps = false;
        $post->save();
        
        $prev_post = BlogPost::where("status", "=", "published")->
            where("created_at", "<", $post->created_at)->
            orderBy("created_at", "DESC")->
            take(3)->get();
        
        return view("web.blog-post", array(
                "post" => $post,
                "prev_post" => $prev_post
            )
        );
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
