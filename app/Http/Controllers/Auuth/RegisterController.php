<?php

namespace App\Http\Controllers\Auuth;

use App\Http\Controllers\Controller;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    public function index()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        // validation
        $this->validate($request, ['name' => 'required|max:255', 'username' => 'required|max:255', 'email' => 'required|email|max:225', 'password' => 'required|confirmed',]);
        // store user
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        Auth::attempt($request->only('email', 'password'));
        return redirect()->route('dashboard');
    }
}
