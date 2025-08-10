<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Room;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Type;

class IndexController extends Controller
{
    public function index()
    {
        $room = Room::paginate(3);
        // dd(auth()->user());
        $type = Type::get();
        return view('index', compact('type', 'room'));
    }

    public function pesan()
    {
        $uri = Route::currentRouteName();
        // dd($uri);
        return view('pesan', compact('uri'));
    }
    public function room(Request $request)
    {
        session(['return_url' => request()->fullUrl()]);
        // Jangan proses search kalau semua kolom (kecuali type_id) kosong
        if (
            !$request->filled('from') &&
            !$request->filled('to') &&
            !$request->filled('quantity') &&
            !$request->filled('count') &&
            !$request->filled('type_id')
        ) {
            return redirect()->back()->with('error', 'Harap isi minimal satu kolom pencarian atau pilih tipe kamar.');
        }

        // Base query (masih builder)
        $query = Room::with('type', 'status');

        // 1) Filter kapasitas tamu (count) terlebih dahulu
        if ($request->filled('count')) {
            $query->where('capacity', '>=', (int) $request->count);
        }

        // 2) Filter tipe jika dipilih
        if ($request->filled('type_id')) {
            $query->where('type_id', $request->type_id);
        }

        // 3) Jika ada tanggal (dengan atau tanpa quantity), cek availability per room
        if ($request->filled('from') && $request->filled('to')) {
            $stayfrom = Carbon::parse($request->from);
            $stayuntil = Carbon::parse($request->to);

            // default desired quantity = 1 jika tidak diisi
            $desiredQty = $request->filled('quantity') ? (int) $request->quantity : 1;

            $periode = new \DatePeriod($stayfrom, new \DateInterval('P1D'), $stayuntil);

            // Ambil kandidat setelah apply capacity & type filter (mengurangi jumlah loop)
            $candidateRooms = $query->get();

            $roomIdsTidakCukup = [];
            foreach ($candidateRooms as $room) {
                $cukup = true;

                foreach ($periode as $date) {
                    $tanggal = $date->format('Y-m-d');

                    $jumlahDipesan = Transaction::where('status', '!=', 'check out')
                        ->where('room_id', $room->id)
                        ->where('check_in', '<=', $tanggal)
                        ->where('check_out', '>', $tanggal)
                        ->sum('quantity');

                    $sisa = $room->stock - $jumlahDipesan;

                    if ($sisa < $desiredQty) {
                        $cukup = false;
                        break;
                    }
                }

                if (!$cukup) {
                    $roomIdsTidakCukup[] = $room->id;
                }
            }

            // Kembalikan ke builder: exclude room yang tidak cukup
            if (!empty($roomIdsTidakCukup)) {
                $query->whereNotIn('id', $roomIdsTidakCukup);
            }
        } else {
            // kalau tidak ada tanggal, tetapi ada quantity => cek stock global
            if ($request->filled('quantity')) {
                $query->where('stock', '>=', (int) $request->quantity);
            }
        }

        // Ambil hasil akhir dengan paginate
        $rooms = $query->paginate(20);
        $roomsCount = $rooms->total();
        $type = Type::get();

        return view('frontend.rooms', compact('rooms', 'roomsCount', 'request', 'type'));
    }




    public function facility()
    {
        return view('frontend.facilities');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function about()
    {
        $r = Room::count();
        $c = Customer::count();
        $t = Transaction::count();
        // dd($r);
        return view('frontend.about', compact('r', 'c', 't'));
    }



    private function getUnocuppiedroom($request, $occupiedRoomId)
    {
        $rooms = Room::with('type', 'status')
            ->whereNotIn('id', $occupiedRoomId);

        if ($request->count != null) {
            $rooms->where('capacity', '>=', $request->count);
        }

        if ($request->type_id) {
            $rooms->where('type_id', $request->type_id);
        }

        return $rooms->orderBy('capacity')->paginate(10);
    }

    private function getUnocuppiedroom2($request)
    {
        $rooms = Room::with('type', 'status')
            ->where('capacity', '>=', $request->count);

        if ($request->type_id) {
            $rooms->where('type_id', $request->type_id);
        }

        return $rooms->orderBy('capacity')->paginate(10);
    }

    private function countUnocuppiedroom($request, $occupiedRoomId)
    {
        $roomsCount = Room::with('type', 'status')
            ->whereNotIn('id', $occupiedRoomId);

        if ($request->count != null) {
            $roomsCount->where('capacity', '>=', $request->count);
        }

        if ($request->type_id) {
            $roomsCount->where('type_id', $request->type_id);
        }

        return $roomsCount->count();
    }

    private function countUnocuppiedroom2($request)
    {
        $roomsCount = Room::with('type', 'status')
            ->where('capacity', '>=', $request->count);

        if ($request->type_id) {
            $roomsCount->where('type_id', $request->type_id);
        }

        return $roomsCount->count();
    }



    private function getOccupiedRoomID($stayfrom, $stayto)
    {
        $occupiedRoomId = Transaction::where([['check_in', '<=', $stayfrom], ['check_out', '>=', $stayto]])
            ->orWhere([['check_in', '>=', $stayfrom], ['check_in', '<=', $stayto]])
            ->orWhere([['check_out', '>=', $stayfrom], ['check_out', '<=', $stayto]])
            ->pluck('room_id');
        return $occupiedRoomId;
    }
}
