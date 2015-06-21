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
}
