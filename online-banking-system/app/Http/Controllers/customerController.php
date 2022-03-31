<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\account;
use App\Models\contacts;
use App\Models\transaction;
use Illuminate\Http\Request;
use App\Models\customer;
class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer=customer::all();
      //  $customer = customer::with(['account'])->first();

        return view('customer',compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {    
      
        $customer=customer::where('customer_id', $id)->get();
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
      
       
       return view('show',compact('customer','accounts','contacts','sendmoney','receivedmoney'));
     
 }
 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

