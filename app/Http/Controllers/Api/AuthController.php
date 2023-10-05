<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseController;
use App\Models\User;
use Illuminate\Http\Request;

use Validator;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AuthController extends BaseController
{
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>['required','string','max:8'],
            'email'=>['required','email','unique:users'],
            'password'=>['required','min:6'],
            'confirm_password'=>['required','same:password'],
        ]);


        if($validator->fails()){
            return $this->sendError('Validation error',$validator->errors());
        }



        $password = bcrypt($request->password);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$password
        ]);


        $success['token'] = $user->createToken('RestApi')->plainTextToken;
        $success['user_id'] = $user->id;

        return $this->sendResponse($success,'User registration successful');
    }


    public function login(Request $request){
       $validator = Validator::make($request->all(),[

            'email'=>['required','email'],
            'password'=>['required'],

        ]);

        if($validator->fails()){
            return $this->sendError('Validation error',$validator->errors());
        }

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            $user = Auth::user();
            $success['token'] = $user->createToken('RestApi')->plainTextToken;
            $success['user_id'] = $user->id;

            return $this->sendResponse($success,'User Logged in successfully');
        }else{
            return $this->sendError('Unauthorized user',[]);
        }
    }

    public function logout(){
        $user = Auth::user();
        $user->tokens()->delete();
        return $this->sendResponse([],'User Logged out');
    }
}
