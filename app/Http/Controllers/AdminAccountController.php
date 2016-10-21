<?php namespace App\Http\Controllers;

use Request;
use Validator;
use Auth;
use Redirect;

use App\Models\User;
use App\Models\PaymentType;

class AdminAccountController extends Controller {
	
	public function account(){
        return view('admin.accountConfig');
    }
	public function saveNewType()
	{
       $validator = Validator::make(Request::all(),PaymentType::save_rules($id),PaymentType::$custom_messages); 

       if ($validator->passes()) {

           $paymentType = PaymentType::where("type", "=", trim(Input::get("type")))->first();

           if(!$paymentType){
               $paymentType = new PaymentType;
               $paymentType->author()->associate(Auth::user());
               $paymentType->type = trim(Input::get('type'));
           }
            if ($paymentType->save()) {
                return [
                    'response' => 'Success'
                ];
            } else {
                return [
                    'response' => 'Can not save data'
                ];
            }
       }

	}
	
}
