<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth/daftar', [
            'title' => 'Daftar'
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
            // 'g-recaptcha-response' => 'required|captcha'

        ]);
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect('auth/login')->with('oke', 'Registrasi Berhasil, Silahkan Login');
    }
}
