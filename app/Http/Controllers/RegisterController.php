<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('Register.Index');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'alamat' => 'required|max:255',
            'password' => 'required|min:3'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with('loginSuccess', 'Register Berhasil, Silahkan Login');
    }
}