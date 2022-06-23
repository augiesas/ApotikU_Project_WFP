<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function destroy(User $user)
    {
        //
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

    public function listUsers()
    {
        $allData = User::All()->where('role', 'buyer');

        return view('user.index', compact('allData'));
    }

    public function showRoyalBuyer()
    {
        $data = User::join('transactions', 'users.id', '=', 'transactions.user_id')
        ->select('users.id','users.name','users.email', DB::raw('SUM(transactions.total) as total'))
        ->groupBy('users.id','users.name','users.email')
        ->orderBy('total', 'desc')
        ->limit(3)
        ->get();

        return view('report.topCustomer', compact('data'));
    }

    // Manggil form
    public function edit (User $user)
    {
        $data = User::find($user);
        return view('user.edit', compact('data'));
    }

    public function editUser($id)
    {
        $data = User::find($id);
        return view('user.edit', compact('data'));
    }

    // Jalanin proses edit
    public function update(Request $request, User $user)
    {
        $user->name = $request->get('name');
        $user->role = $request->get('role');
        $user->save();
        return redirect()->route('home');
    }
}
