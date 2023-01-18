<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\auth\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->intended('dashboard');
        }
        return view('auth.login');
    }

    public function Login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau Password yang anda masukan salah!!!',
        ]);
    }

    // public function register()
    // {
    //     return view('auth.register');
    // }

    // public function daftar(Request $request)
    // {
    //     $input = $request->all();
    //     $user = User::create([
    //             'name' => $input['name'],
    //             'email' => $input['email'],
    //             'password' => bcrypt($input['password'])
    //         ]);

    //         $credentials = $request->validate([
    //             'email' => ['required', 'email'],
    //             'name' => ['required'],
    //             'password' => ['required'],
    //         ]);

    //         if (Auth::attempt($credentials)) {
    //             $request->session()->regenerate();
    //             return redirect()->intended('dashboard');
    //         }

    //         return back()->withErrors([
    //             'email' => 'The provided credentials do not match our records.',
    //         ]);
    // }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

}

// $input = $request->all();
//             $user = User::where('email', $input['email'])
//                     ->first();
//             if (Hash::check($input['password'],($user['password'])) == true) {
//                 return view('home')->with('user',$user);
//             }else{
//                 return view('auth.login');
//             }
