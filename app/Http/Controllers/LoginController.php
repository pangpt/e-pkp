<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function loginpage() {
        return view('authpage.login');
    }

    public function login(Request $request) {
        $this->validate($request, [
            'nip' => 'required',
            'password' => 'required|min:5',
        ]);

        $nip = $request->nip;
        $password = $request->password;

        if(Auth::attempt(['nip' => $nip, 'password' => $password])) {
            return redirect()->intended('/dashboard');
        } else {
            return redirect()->back()->with('error', 'NIP atau password tidak sesuai');
        }
    }

    public function logout(Request $request) {
        auth()->guard('web')->logout();
        session()->flush();

        return redirect()->route('loginpage');
    }
}
