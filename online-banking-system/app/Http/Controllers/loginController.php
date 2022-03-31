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
     
        $customer=customer::where('customer_id', $id)->get()->first();
        $accounts=account::where('customer_id', $id)->get();
        $contacts=contacts::where('customer_id', $id)->get();

        $tr=[];
        $sendmoney=[];
        $receivedmoney=[];
        foreach($accounts as $account){
            array_push($tr,$account);
        }
        foreach($tr as $account){
          
        $sendTransactions=transaction::join ('contacts', 'transactions.contact_id', '=', 'contacts.contact_id')
        ->where('transactions.account_number', $account['account_number'])
        ->get(['transactions.*','contacts.account_number as receiver_account_number']);
        array_push($sendmoney,$sendTransactions); 
        }
        
        foreach($tr as $account){
            $receiveTransactions=transaction::join ('contacts', 'transactions.contact_id', '=', 'contacts.contact_id')
            ->where('contacts.account_number', $account['account_number'])
            ->get(['transactions.*','contacts.account_number as sender_account_number']);
            array_push($receivedmoney,$receiveTransactions); 
        }
     
      
      return view('dashboard',compact('customer','accounts','contacts','sendmoney','receivedmoney','accounts'));
    }
        else{
            $error = 'Please verify the username and password';
            return view('index', compact('error', 'card', 'password'));
        }
    }
}
