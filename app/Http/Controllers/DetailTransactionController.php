<?php

namespace App\Http\Controllers;

use App\DetailTransaction;
use App\Transaction;
use Illuminate\Http\Request;

class DetailTransactionController extends Controller
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
        $data = new DetailTransaction();

        $price = $request->get('price');
        $quantity = $request->get('quantity');

        $data->transaction_id = $request->get('transaction_id');
        $data->medicine_id = $request->get('medicine_id');
        $data->price = $price;
        $data->quantity = $quantity;

        $subtotal = $price * $quantity;
        $data->sub_total = $subtotal;

        $data->save();

        // return redirect()->route('reportShowCategory')->with('status','Category is added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DetailTransaction  $detailTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(DetailTransaction $detailTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetailTransaction  $detailTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailTransaction $detailTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetailTransaction  $detailTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailTransaction $detailTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetailTransaction  $detailTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailTransaction $detailTransaction)
    {
        //
    }

    public function showAllData()
    {
        $alldata = DetailTransaction::all();

        return view('', compact('alldata'));
    }

    public function showAllData_byId($user_id)
    {
        $data = DetailTransaction::find($user_id);

        $transaction_id = $data->transaction_id;

        $transaction = Transaction::find($transaction_id);

        $total = $transaction->total;

        return view('', compact('data','total'));
    }
}
