<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;


use App\Student;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function home(){
        return view("home");
    }
    public function postFeedback(Request $request){

                $validator = Validator::make($request->all(),[
                    "name" => "required|name",
                    "email"=> "required|email",
                    "telephone"=> "required|telephone",
                    "status"=> "required|status",
                ]);
    
                if($validator->fails()){
                    return response()->json(["status"=>false,"message"=>$validator->errors()->first()]);
                }
                $name = $request->get("name");
                $email = $request->get("email");
                $telephone = $request->get("telephone");
                $status = $request->get("status");
                if(Student::attempt(['name'=>$name,'email'=>$email,'telephone'=>$telephone,'status'=>$status])){
                    return response()->json(['status'=>true,'message'=>"Feedback successfully!"]);
                }
                return response()->json(['status'=>false,'message'=>"Feedback failure"]);
            }
    
}
