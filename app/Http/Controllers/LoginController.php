<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('login.index');
    }

    public function register()
    {
        return view('login.register');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        // dd($request);
        $remember = $request->has('remember') ? true : false;
        $minutes = 1440;
        if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')], $remember)) {
            if ($request->has('remember')) {
                Cookie::queue('username', $request->username, $minutes);
                Cookie::queue('password', $request->password, $minutes);
            }
            Alert::success('Success', 'Login berhasil');
            return redirect()->intended('/')->with('success');
        }
        Alert::error('Error', 'Gagal');
        return redirect('/login');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' =>  'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'password' => ['min:3', 'max:255', 'required'],
        ]);

        // dd($request->all());

        if ($request->confirmation_password != $request->password) {
            Alert::error('Error', 'Gagal');
            // dd($request->all());
            return redirect('/register');
        }

        $p = Customer::create([
            'name' => $request->name
        ]);
        User::create([
            'username' => $request->username,
            'c_id' => $p->id,
            'password' => bcrypt($request->password)
        ]);
        $request->session();
        Alert::success('Success', 'Ayo Login!');
        return redirect('/login')->with('success', 'Registration successfull. Please Login');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Alert::success('Success', 'Berhasil Logout');
        return redirect('/login');
    }
}
