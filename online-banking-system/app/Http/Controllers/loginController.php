<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class loginController extends Controller
{

    public function authenticate(Request $request)
    {
       $input = $request->input();
       $card = $input['cardNumber'];
       $password = $input['password'];

       $pwd = DB::table('logins')->where('card_number', $card)->value('password');
       
       if ($password == $pwd){
        return view('client');
        }
        else{
            $error = 'Please verify the username and password';
            return view('index', compact('error'));
        }
    }
}
