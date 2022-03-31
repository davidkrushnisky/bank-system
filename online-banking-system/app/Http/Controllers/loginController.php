<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
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
        $fName=DB::table('customers')->where('card_number', $card)->value('first_name');
        $lName=DB::table('customers')->where('card_number', $card)->value('last_name');
        $doB=DB::table('customers')->where('card_number', $card)->value('date_of_birth');
        $phone=DB::table('customers')->where('card_number', $card)->value('phone_number'); 
        $email=DB::table('customers')->where('card_number', $card)->value('email');
        $address=DB::table('customers')->where('card_number', $card)->value('address');
        $account=DB::table('accounts')->where('customer_id', $id)->value('account_number');
        $type=DB::table('accounts')->where('customer_id', $id)->value('type');
        $balance=DB::table('accounts')->where('customer_id', $id)->value('balance'); 

        return view('dashboard', compact('card', 'fName', 'lName', 'doB', 'phone', 'email', 'address', 'account', 'type', 'balance'));
        }
        else{
            $error = 'Please verify the username and password';
            return view('index', compact('error', 'card', 'password'));
        }
    }
}
