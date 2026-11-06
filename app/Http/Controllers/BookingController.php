<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function create()
    {
        $rooms = Room::all();
        return view('booking.create', compact('rooms'));
    }

    public function store(BookingRequest $request)
    {
        $booking = new Booking();
        $booking->user_id = Auth::id();
        $booking->room_id = $request->room_id;
        $booking->date = $request->date;
        $booking->payment = $request->payment;
        $booking->status = 'new';
        $booking->save();

        return redirect()->route('dashboard')->with('success', 'Заявка отправлена');
    }

    public function index()
    {
        $bookings = Booking::with(['user', 'room'])->get();
        return view('booking.admin', compact('bookings'));
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        if (Auth::user()->login !== 'Conf2027') {
            return redirect()->route('dashboard');
        }

        $booking->status = $request->status;
        $booking->save();

        return redirect()->route('booking.admin')->with('success', 'Статус обновлён');
    }

    public function myBookings()
    {
        $bookings = Booking::where('user_id', Auth::id())->with('room')->get();
        return view('booking.my', compact('bookings'));
    }

    public function storeReview(Request $request, Booking $booking)
    {
        if ($booking->user_id !== Auth::id() || $booking->status !== 'completed') {
            return redirect()->route('booking.my');
        }

        $booking->review = $request->review;
        $booking->save();

        return redirect()->route('booking.my')->with('success', 'Отзыв сохранён');
    }
}
