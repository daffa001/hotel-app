<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use App\Models\Cart;
use App\Models\Payment;
use App\Models\Room;
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

    public function checkStock(Request $request)
    {
        $id = Auth()->user()->Customer->id;
        $carts = Cart::where('c_id', $id)->get();

        $outOfStock = [];

        foreach ($carts as $item) {
            $room = Room::find($item->rooms_id);

            // 1. Cek stok habis
            if (!$room || $room->stock <= 0) {
                $outOfStock[] = $room->name ?? 'Kamar Tidak Ditemukan';
                $item->delete();
                continue;
            }

            // 2. Cek bentrok tanggal dengan transaksi yang sudah bayar
            $conflictingTransactions = Transaction::where('room_id', $item->rooms_id)
                ->whereIn('status', ['Reservation', 'Checkin', 'Paid']) // kamu bisa sesuaikan status
                ->where(function ($query) use ($item) {
                    $query->whereBetween('check_in', [$item->check_in, $item->check_out])
                        ->orWhereBetween('check_out', [$item->check_in, $item->check_out])
                        ->orWhere(function ($q) use ($item) {
                            $q->where('check_in', '<=', $item->check_in)
                                ->where('check_out', '>=', $item->check_out);
                        });
                })
                ->exists();

            if ($conflictingTransactions) {
                $outOfStock[] = $room->name . ' (tanggal tidak tersedia)';
                $item->delete();
            }
        }

        if (count($outOfStock) > 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'Beberapa kamar telah dihapus karena stok kosong atau tanggal bentrok:',
                'rooms' => $outOfStock
            ]);
        }

        return response()->json([
            'status' => 'ok'
        ]);
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
        $room = Room::find($c->rooms_id);
        if ($room && $room->stock > 0) {
            $room->stock -= 1;
            $room->save();
        } else {
            return redirect()->back()->with('error', 'Stok kamar tidak mencukupi.');
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
