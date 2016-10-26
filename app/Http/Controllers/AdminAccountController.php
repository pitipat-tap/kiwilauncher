<?php namespace App\Http\Controllers;

use Request;
use Validator;
use Auth;
use Response;

use App\Models\User;
use App\Models\PaymentType;

class AdminAccountController extends Controller {
	
	public function account(){
        return view('admin.accountConfig');
    }
	public function saveNewType()
	{

       $type = Request::json()->all();

       $paymentType = PaymentType::where("type", "=", trim($type['type']))->first();

       if(!$paymentType){
         $paymentType = new PaymentType;
         $paymentType->author()->associate(Auth::user());
         $paymentType->type = trim($type['type']);
         $paymentType->status = "available";

           if($paymentType->save()){
               return Response::json(array(
                   'error' => false,
                   'type' => "success",
                   'status_code' => 200
               ));
           } 
       } else {
           return Response::json(array(
               'error' => false,
               'type' => "already exist",
               'status_code' => 200
           ));
       }


	}
	
}
