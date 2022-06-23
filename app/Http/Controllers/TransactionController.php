<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\DetailTransaction;
use App\Medicine;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Carbon\Carbon;
use App\Http\Controllers\DetailTransactionController;


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
        // dd($request->get('total'));
        $data->user_id = $request->get('user_id');
        $data->total = $request->get('total');
        $data->transaction_date = $request->get('transaction_date');

        $data->save();
        return redirect()->route('reportShowAllDataNFP')->with('status','Transaction is added');
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
        $array_detail = [];
        $array_medicine = [];
        $count = 0;

        $allData = Transaction::all();
        $array_detail = [];
        $count = 0;
        foreach ($allData as $d) {
            $user_id = $d->user_id;
            $user = User::find($user_id);

            $id_transaction = $d->id;
            $array_detail[$count] = array(
                'name' => $user->name,
                'transaction' => $d->id,
                'total' => $d->total,
                'date'=>$d->transaction_date
            );
            $count++;
            
        }
        
        // $allData = Transaction::all();
        // $array_detail = [];
        // $count = 0;
        // foreach ($allData as $d) {
        //     $user_id = $d->user_id;
        //     $user = User::find($user_id);

        //     $id_transaction = $d->id;
        //     $array_detail[$count] = array(
        //         'name' => $user->name,
        //         'transaction' => DetailTransaction::where('transaction_id', $id_transaction)->get(),
        //         'total' => $d->total,
        //         'date'=>$d->transaction_date
        //     );
        //     $count++;
            
        // }
        // dd($array_detail);

        return view('transaction.show', compact('array_detail'));
    }

    public function ShowAjax(Request $request)
    {
        $id = ($request->get('id'));
        $products = [];
        $data = DetailTransaction::where('transaction_id',$id)->get();
        foreach($data as $d){
            array_push($products, Medicine::find($d->medicine_id));
        }
    
        return response()->json(array(
            'msg' => view('transaction.getDetailForm', compact('data', 'products'))->render()
        ), 200);
    }

    public function submit_front()
    {
        $this->authorize('checkbuyer');

        $cart = session()->get('cart');
        $user = Auth::user();
        $t = new Transaction;
        $t->user_id = $user->id;
        $t->transaction_date = Carbon::now()->toDateTimeString();

        $total=0;
        foreach($cart as $detail){
            $total += $detail['price'] * $detail['quantity'];
        }
        $t->total = $total;
        $t->save();
        
        foreach($cart as $detail){
            $subtotal = $detail['price'] * $detail['quantity'];

            DB::table('detail_transactions')->insert([
                'transaction_id' => $t->id,
                'medicine_id' => $detail['id'],
                'price' => $detail['price'],
                'quantity' => $detail['quantity'],
                'subtotal' => $subtotal
            ]);            
        }

        session()->forget('cart');
        return redirect()->route('home');
    }

    public function form_submit_front()
    {
        $this->authorize('checkbuyer');
        return view('cart.checkout');
    }

    public function getMed($arraydetail)
    {
        $data_med = [];
        foreach($arraydetail as $detail){
            $id = $detail->medicine_id;
            array_push($data_med,Medicine::find($id));
        }
        return $data_med;
    }

    public function findDetail($id)
    {
        $data = DetailTransaction::where('transaction_id',$id)->get();
        foreach($data as $d){
            $data_medicine = Medicine::find($d->id);
        }

        return response()->json(array(
            'msg' => view('transaction.getDetailForm', compact('data', 'products'))->render()
        ), 200);
    }

    public function showAllData_byId()
    {
        $array_transaction = [];
        $array_medicine = [];
        $count = 0;
        $count1 = 0;
        $user = Auth::user();

        $data = Transaction::where('user_id', $user->id)->get();

        // ambil data transaksi
        foreach ($data as $d) {
            $detailTransaction = $d->detailTransaction;
            $array_transaction[$count] = [
                'transaction_id' => $d->id,
                'transaction_date' => $d->transaction_date,
                'total' => $d->total,
                'data_detailtrans' => $detailTransaction,
                // 'medicine' => $this->getMed($detailTransaction),
            ];
            
            $count++;
        }
        // dd($array_transaction);

        return view('transaction.show_history', compact('array_transaction'));
    }

    
}
