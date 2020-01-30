<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use function GuzzleHttp\json_encode;

class UserController extends Controller
{
    public function index(){
        return User::get();
    }

    public function store(Request $request){
        $this->validate($request,[
            'username' => 'required|string|max:50',
            'useremail' => 'required|string|email|max:80',
            'userpassword' => 'required|string|max:50'
        ], [
            'username.required' => 'A username is required',
            'useremail.required' => 'An email address is required',
            'useremail.email' => 'A valid email address is required',
            'userpassword.required' => 'A password is required']
        );

        $new_user = new User();
        $new_user->name = $request->username;
        $new_user->email = $request->useremail;
        $new_user->password = $request->userpassword;
        $new_user->save();

        return response()->json([ 'user' => $new_user, ], 200);
    }

    public function show($id){
        $user = User::where('id','=',$id)->get();
        return response()->json([ 'userdetails' => $user, ], 200);
    }
    
}
