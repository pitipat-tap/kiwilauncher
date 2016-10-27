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
	public function saveNewPaymentType()
	{

       $type = Request::json()->all();

       $paymentType = PaymentType::where("type", "=", trim($type['type']))->first();

       if(!$paymentType){
         $paymentType = new PaymentType;
         $paymentType->author()->associate(Auth::user());
         $paymentType->type = trim($type['type']);
         $paymentType->status = "available";

           if($paymentType->save()){
               $type = PaymentType::get();
               return Response::json(array(
                   'error' => false,
                   'type' => $type,
                   'status_code' => 200
               ));
           } 
       } else {
           return Response::json(array(
               'error' => false,
               'type' => "already exist",
               'status_code' => 201
           ));
       }


	}

    public function getPaymentType(){
        $type = PaymentType::get();

        return Response::json(array(
            'type' => $type,
            'status_code' => 200
        ));

    }
	
}
