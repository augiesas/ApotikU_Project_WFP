<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\DetailTransaction;
use App\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Carbon\Carbon;


class TransactionController extends Controller
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
        $data = new Transaction();

        $data->user_id = $request->get('user_id');
        $data->total = $request->get('total');
        $data->transaction_date = $request->get('transaction_date');

        $data->save();
        // return redirect()->route('reportShowAllDataNFP')->with('status','Transaction is added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return view('', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    public function showAllData()
    {
        $alldata = Transaction::all();

        $array_detail = [];

        foreach ($alldata as $d) {
            $id_transaction = $d->id;
            array_push($array_detail, DetailTransaction::where('transaction_id', $id_transaction)->get());
        }
        // dd($array_detail);

        // return view('', compact('alldata'));
    }

    public function ShowAjax(Request $request)
    {
        $id = ($request->get('id'));
        $data = Transaction::find($id);
        $products = $data->medicine;
        return response()->json(array(
            'msg' => view('transaction.showModal', compact('data', 'products'))->render()
        ), 200);
    }

    public function submit_front()
    {
        $this->authorize('checkbuyer');

        $cart = session()->get('cart');
        $user = Auth::user();
        $t = new Transaction;
        $t->buyer_id = $user->id;
        $t->transaction_date = Carbon::now()->toDateTimeString();
        $t->save();

        $totalharga = $t->insertMedicine($cart, $user);
        $t->total = $totalharga;
        $t->save();

        session()->forget('cart');
        return view('home');
    }

    public function form_submit_front()
    {
        $this->authorize('checkmember');
        return view('cart.checkout');
    }

    public function showAllData_byId()
    {
        $array_detail = [];
        $user = Auth::user();

        $data = Transaction::where('user_id', $user->id)->get();

        foreach ($data as $d) {
            $data_detail = $d->detailTransaction;
            foreach($data_detail as $detail){
                $med_id = $detail->medicine_id;
                $data_med = Medicine::find($med_id);
                array_push($array_detail, $data_med);
            }
        }
        // dd($array_detail);

        return view('transaction.show_history', compact('data', 'array_detail'));
    }
}
