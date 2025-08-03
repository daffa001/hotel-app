<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use App\Models\Cart;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {

        if (auth()->guest()) {
            return redirect('/login');
        }
        $id = Auth()->user()->Customer->id;
        $user = Auth()->user();
        $not = [1];
        $his = Cart::where('c_id', $id)->orderBy('id', 'desc')->paginate(10);
        // $his = Cart::with('transaction.room')
        //    ->where('c_id', $id)
        //    ->orderby('id', 'desc')
        //    ->paginate(10);

        // $p = Payment::where('c_id', $id)->with('Customer', 'Transaction', 'Methode')->first();

        return view('user.cart', compact('his', 'user'));
    }

    public function checkoutPage()
    {
        $id = Auth()->user()->Customer->id;
        $userId = auth()->id();
        // $carts = Cart::with('room.type')->where('c_id', $userId)->get();
        // $total = $carts->sum('price');
        $his = Cart::where('c_id', $id)->orderBy('id', 'desc')->paginate(10);
        $paymentmethodnotid = [1];
        $paymentmet = PaymentMethod::whereNotIn('id', $paymentmethodnotid)->get();
        return view('frontend.cart.order', compact('his', 'paymentmet'));
    }

    public function checkoutPageID($id)
    {
        // dd($t->Payments[0]->Methode->nama);
        $paymentmethodnotid = [1];
        $paymentmet = PaymentMethod::whereNotIn('id', $paymentmethodnotid)->get();
        $his = Transaction::where('payments_id', $id)->orderBy('id', 'desc')->paginate(10);
        // dd($pay->id);
        return view('frontend.cart.orderID', compact('his', 'paymentmet'));
    }
public function checkoutID(Request $request, $id)
{
    $userId = auth()->id();

    // Validasi file gambar bukti
    $validatedData = $request->validate([
        'image' => 'required|image|file',
    ]);

    // Simpan gambar ke storage
    $image = $request->file('image')->store('bukti-images', 'public');

    // Cari data Payment yang sesuai ID
    $payment = Payment::findOrFail($id);

    // Update kolom image dan status
    $payment->update([
        'image' => $image,
        'status' => 'Pending', // atau 'Sudah Bayar', tergantung konvensi kamu
    ]);

    return redirect('/history/')->with('success', 'Harap Tunggu Konfirmasi Dari Admin.');
}


    public function checkout(Request $request)
    {
        $userId = auth()->id();

        // Ambil isi keranjang
        $carts = Cart::where('c_id', $userId)->get();

        if ($carts->isEmpty()) {
            return redirect()->back()->with('error', 'Keranjang kosong.');
        }

        // Simpan ke tabel transaksi utama

        $jum_kamar = 0;
        $total = 0;
        foreach ($carts as $c) {
            $jum_kamar = $jum_kamar + 1;
            $total = $total + $c->price;
        }

        $validatedData = $request->validate([
            'image' => 'required|image|file',
        ]);
        if ($request->file('image')) {
            $image = $validatedData['image'] = $request->file('image')->store('bukti-images', 'public');
        }

        $count = Payment::count() + 1;
        $inv = '0' . $jum_kamar . $request->customer . 'INV' . $count . Str::random(4);

        $payment = Payment::create([
            'c_id' => $c->c_id,
            'invoice' => $inv,
            'payment_method_id' => $request->payment_method_id,
            'price' => $total,
            'status' => 'Pending',
            'image' => $image
        ]);
        foreach ($carts as $c) {
            Transaction::create([
                'c_id' => $c->c_id,
                'payments_id' => $payment->id,
                'room_id' => $c->rooms_id,
                'check_in' => $c->check_in,
                'check_out' => $c->check_out,
                'status' => 'Reservation',
                'price' => $c->price,
            ]);
        }
        // Hapus keranjang
        Cart::where('c_id', $userId)->delete();

        return redirect('/rooms/')->with('success', 'Harap Tunggu Konfirmasi Dari Admin.');
    }

    public function delete(Request $request)
    {
        $validated = $request->validate([
            'cart_id' => 'required|exists:carts,id',
        ]);

        Cart::destroy($validated['cart_id']);

        return redirect('/cart/')->with('success', 'Item berhasil dihapus dari keranjang.');
    }
}
