<?php
namespace App\Http\Controllers;

use App\Models\Notifications;
use App\Models\Payment;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use RealRashid\SweetAlert\Facades\Alert;
use Termwind\Components\Raw;

class CheckoutController extends Controller
{
    public function index(){
        $today = Carbon::now()->isoFormat('Y-M-D');
        $transaction = Transaction::with('Customer', 'Payments', 'Room')->where('check_out', '>=', $today)->orderby('id', 'desc')->get();
        return view('dashboard.checkout.checkoutlist', compact('transaction'));
    }


    public function checkin ($id) {
        
        $data = Transaction::where('id', $id)->first();
 

        if($data->status === 'Reservation') {

            $data->update([
                'status' => 'Check In'
            ]);

        } else {
             $data->update([
                'status' => 'Check Out'
            ]);
        }  

         $today = Carbon::now()->isoFormat('Y-M-D');
        $transaction = Transaction::with('Customer', 'Payments', 'Room')->where('check_out', '>=', $today)->orderby('id', 'desc')->get();
        return view('dashboard.checkout.checkoutlist', compact('transaction'));
       
    }
}