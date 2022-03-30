<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\account;
use App\Models\contacts;
use App\Models\customer;
use App\Models\transaction;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class transactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //dd($request);
        $customer_account = $request->accounts;
        $contact_id = $request->contacts;
        $amount = $request->amount;

        $account = account::find($customer_account);

        $balance = $account->balance;
        if ($balance > $amount) {
            $account->balance = $balance - $amount;
            $account->save();


            $transaction = new transaction();
            $transaction->account_number = $customer_account;
            $transaction->contact_id = $contact_id;
            $transaction->amount = $amount;
            $transaction->flag = FALSE;
            //  dd($transaction);
            $transaction->save();
        } else
            dd('no');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        if ($request->accept != null) {

            $transaction = DB::table('transactions')->where('transaction_id', $id)->get()->first();
            if ($transaction->flag == false) {
                $contact_id = $transaction->contact_id;
                $amount = $transaction->amount;

                $contact_account = DB::table('contacts')->where('contact_id', $contact_id)->get()->first();
                $acc = $contact_account->account_number;
                $account = DB::table('accounts')->where('account_number', $acc)->get()->first();
                $balance = $account->balance;
                $newbalance = $amount + $balance;
                // dd($newbalance);
                DB::table('accounts')->where('account_number', $acc)->update([
                    'balance' => $newbalance,
                ]);
                //  dd($contact_account);
                DB::table('transactions')->where('transaction_id', $id)->update([
                    'flag' => true,
                ]);


                return back();
            } else return 'you have recieved this money';
        }
        if ($request->cancel != null) {
            $transaction = DB::table('transactions')->where('transaction_id', $id)->get()->first();
            //finding time diff
            $current_timestamp = Carbon::now()->timestamp;
            $current_timestamp = Carbon::parse($current_timestamp);
            $createdTime = $transaction->created_at;
            $creat = Carbon::parse($createdTime);
            $min = $current_timestamp->diffInMinutes($creat);

            if ($transaction->flag == false) {
                if ($min < 120) {
                    $account_number = $transaction->account_number;
                    $account = DB::table('accounts')->where('account_number', $account_number)->get()->first();
                    $balance = $account->balance;
                    $amount = $transaction->amount;
                    $newbalance = $amount + $balance;

                    DB::table('accounts')->where('account_number', $account_number)->update([
                        'balance' => $newbalance,
                    ]);

                    DB::table('transactions')->where('transaction_id', $id)->delete();

                    return back();
                } else return 'your 120 min time to cancel is over';
            }
        } else return 'money has recieved';

        return back();
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
