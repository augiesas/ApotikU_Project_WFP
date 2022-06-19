<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = Auth::user();

        return redirect('layouts.index');
    }

    public function data_buyer()
    {
        $buyer = User::where('role', 'buyer');

        $id = $buyer->id;
        $name = $buyer->name;
        $email = $buyer->email;
        $password = $buyer->password;
        $role = $buyer->role;

        return view('', compact('id','name','email','password','role'));
    }

    public function showRoyalBuyer()
    {
        $data = User::join('transactions', 'users.id', '=', 'transactions.user_id')
        ->select('users.id','users.email','users.password','users.role', DB::raw('transactions.total as total'))
        ->groupBy('users.id','users.email','users.password','users.role', 'transactions.total')
        ->orderBy('total', 'desc')
        ->limit(3)
        ->get();

        return view('report.topCustomer', compact('data'));
    }
}
