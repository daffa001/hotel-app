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
        return view('index', compact('room'));
    }

    public function pesan()
    {
        $uri = Route::currentRouteName();
        // dd($uri);
        return view('pesan', compact('uri'));
    }
    public function room(Request $request)
    {
        // dd($request->all());
        if (!empty($request->from or $request->count)) {
            $stayfrom = Carbon::parse($request->from)->isoFormat('D MMM YYYY');
            $stayto = Carbon::parse($request->to)->isoFormat('D MMM YYYY');
            // dd($request->all());
            if ($request->from and $request->to and $request->count != null) {
                $occupiedRoomId = $this->getOccupiedRoomID($request->from, $request->to);
                $rooms = $this->getUnocuppiedroom($request, $occupiedRoomId);
                $roomsCount = $this->countUnocuppiedroom($request, $occupiedRoomId);
            } elseif ($request->count != null) {
                $rooms = $this->getUnocuppiedroom2($request);
                $roomsCount = $this->countUnocuppiedroom2($request);
            } else {
                $occupiedRoomId = $this->getOccupiedRoomID($request->from, $request->to);
                $rooms = $this->getUnocuppiedroom($request, $occupiedRoomId);
                $roomsCount = $this->countUnocuppiedroom($request, $occupiedRoomId);
            }
        } else {
            $rooms = Room::paginate(20);
            $roomsCount = Room::count();
        }
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

    public function getBookedDates(Request $request)
    {
        $roomId = $request->input('room_id');
        
        if ($roomId) {
            // Get all transactions for this specific room that haven't expired yet
            $bookedDates = Transaction::where('room_id', $roomId)
                ->where('check_out', '>=', Carbon::now()->format('Y-m-d'))
                ->get(['check_in', 'check_out', 'room_id']);
        } else {
            // Get all active transactions if no specific room is requested
            $bookedDates = Transaction::where('check_out', '>=', Carbon::now()->format('Y-m-d'))
                ->get(['check_in', 'check_out', 'room_id']);
        }
        
        $disabledDates = [];
        $roomSpecificDates = [];
        
        foreach ($bookedDates as $booking) {
            $checkIn = Carbon::parse($booking->check_in);
            $checkOut = Carbon::parse($booking->check_out);
            
            // Add all dates between check_in and check_out (inclusive)
            while ($checkIn->lte($checkOut)) {
                $dateStr = $checkIn->format('Y-m-d');
                $disabledDates[] = $dateStr;
                
                // Also track which room is booked on which date
                if (!isset($roomSpecificDates[$dateStr])) {
                    $roomSpecificDates[$dateStr] = [];
                }
                $roomSpecificDates[$dateStr][] = $booking->room_id;
                
                $checkIn->addDay();
            }
        }
        
        // Remove duplicates and return unique dates
        $disabledDates = array_unique($disabledDates);
        
        return response()->json([
            'disabled_dates' => array_values($disabledDates),
            'room_specific_dates' => $roomSpecificDates
        ]);
    }
}
