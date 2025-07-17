<?php

namespace App\Http\Controllers;
use App\Models\Payment;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){

        if (auth()->guest()) {
            return redirect('/login');
        }
        $id = Auth()->user()->Customer->id;
        $user = Auth()->user();
        $not = [1];
        $his = Payment::where('c_id', $id)->orderby('id', 'desc')->wherenotin('payment_method_id', $not)->paginate(10);

        // $p = Payment::where('c_id', $id)->with('Customer', 'Transaction', 'Methode')->first();

        return view('user.cart', compact('his', 'user'));
    }
}
