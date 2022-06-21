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
    public function store($price, $quantity, $transaction_id, $medicine_id)
    {
        // $data = new DetailTransaction();

        // $data->transaction_id = $transaction_id;
        // $data->medicine_id = $medicine_id;
        // $data->price = $price;
        // $data->quantity = $quantity;

        // $subtotal = $price * $quantity;
        // $data->sub_total = $subtotal;

        // $data->save();

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

    // Buat admin
    public function showAllData()
    {
        $alldata = DetailTransaction::all();

        return view('', compact('alldata'));
    }
}
