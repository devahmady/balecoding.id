<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth/login', [
            'title' => 'Login'
        ]);
    }

    public function auth(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',

        ]);

        $user = User::where('email', $data['email'])->first();
        if(Auth::attempt($data)){
            $user->is_online = true;
            $user->save();
            $request->session()->regenerate();
            return redirect()->intended('/dashboard/home/index');
        }
        return back()->with('error', 'Login Failled !');
    }
    
    public function logout(Request $request){
        
        $user = Auth::user();
        if ($user) {
            $user->is_online = false;
            $user->save();
        }
    
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
