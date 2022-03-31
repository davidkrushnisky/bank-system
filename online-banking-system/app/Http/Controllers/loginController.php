<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\account;
use App\Models\contacts;
use App\Models\transaction;
use App\Models\customer;
use Illuminate\Support\Facades\RateLimiter;

class loginController extends Controller
{

    protected $maxAttempts = 3;
    protected $decayMinutes = 10;

    public function authenticate(Request $request)
    {
       $input = $request->input();
       $card = $input['cardNumber'];
       $password = $input['password'];

       $pwd = DB::table('logins')->where('card_number', $card)->value('password');
       
       if ($password == $pwd){

        $id=DB::table('customers')->where('card_number', $card)->value('customer_id');
  
        return redirect()->route('customer.show',$id);
       
    }
        else{
            $error = 'Please verify the username and password';
            return view('index', compact('error', 'card', 'password'));
        }
    }
}
