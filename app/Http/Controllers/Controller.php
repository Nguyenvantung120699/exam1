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
        $request->validate([
            'name' => 'required|max:191',
            'email' => 'required|max:191',
            'telephone' => 'required|max:10',
            'status' => 'required'
        ], [
            'name.required' => 'Student name is required.',
            'email.required' => 'Student email is required.',
            'telephone.required' => 'Student telephone is required.',
            'status.required' => 'Status is required'
        ]);
        try {
            $feedback = Student::create([
                "name" => $request->get("name"),
                "email" => $request->get('email'),
                "telephone" => $request->get('telephone'),
                "status" => $request->get('status')
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false, 'message' => "Get survey success",
            ], 200);
        }
        return response()->json([
            'status' => true, 'message' => "Get survey success",
        ], 200);

}

}
