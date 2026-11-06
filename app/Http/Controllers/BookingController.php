<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function booking_add(){
        $rooms = Room::all();
        return view("booking_create", compact("rooms"));
    }
    public function booking_addform(BookingRequest $request){
        $booking = new Booking();
        $booking -> user_id = Auth::user()->id;
        $booking -> room_id = $request->room_id;
        $booking -> date = $request->date;
        $booking -> payment = $request->payment;
        $booking -> status = "new";
        $booking->save();
        // return redirect()->route("dashboard");
        return redirect()->route("dashboard");
    }
    public function booking_admin(){
        $bookings = Booking::with("user","room")->get();
        return view("booking_admin", compact("bookings"));
    }
    public function booking_update_status(Request $request, Booking $booking){
        if(Auth::user()->role !== "admin"){
            return redirect()->route("dashboard");
        }
        $booking -> status = $request->status;
        $booking->save();
        // return back();
        return redirect()->route("booking.admin");
    }
    public function booking_list(){
        $bookings = Booking::where("user_id", Auth::user()->id)->with("room")->get();
        return view("booking_my", compact("bookings"));
    }
    public function booking_review(Request $request, Booking $booking){
        if($booking -> user_id !== Auth::user()->id || $booking -> status !== "completed"){
            return redirect()->route("booking.my");
        }
        $booking -> comment = $request->comment;
        $booking->save();
        // return back();
        return redirect()->route("booking.my");
    }
}
