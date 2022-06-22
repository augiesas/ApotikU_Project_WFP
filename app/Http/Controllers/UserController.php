<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function destroy(User $user)
    {
        $this->authorize('delete-permission', $user);
        try {
            $user->delete();
            // return redirect()->route('reportAllMed')->with('status', 'Category successfully deleted');
        } catch (\PDOException $e) {
            $msg = "This user cannot be deleted!";

            // return redirect()->route('reportAllMed')->with('error', $msg);
        }
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
        ->select('users.id','users.name','users.email','users.password','users.role', DB::raw('transactions.total as total'))
        ->groupBy('users.id','users.name','users.email','users.password','users.role', 'transactions.total')
        ->orderBy('total', 'desc')
        ->limit(3)
        ->get();

        return view('report.topCustomer', compact('data'));
    }

    // Manggil form
    public function edit (User $user)
    {
        $data = User::find($user);
        // dd($data);
        return view('user.edit', compact('data'));
    }

    public function editUser($id)
    {
        $data = User::find($id);
        // dd($data);
        return view('user.edit', compact('data'));
    }

    // Jalanin proses edit
    public function update(Request $request, User $user)
    {
        // $this->Validator::make($request, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);
        $user->name = $request->get('name');
        $user->role = $request->get('role');
        // $confirm = $request->get('password_confirmation');
        $user->save();
        return redirect()->route('home');
    }
}
