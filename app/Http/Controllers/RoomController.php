<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function room_add(){
        if(!Auth::user()){
            return redirect()->route("dashboard");
        }
        if(Auth::user()->role !== "admin"){
            return redirect()->route("dashboard");
        }
        return view("room_create");
    }
    public function room_addform(RoomRequest $request){
        if(Auth::user()->role !== "admin"){
            return redirect()->route("dashboard");
        }
        $room = new Room();
        $room -> name = $request->name;
        $room -> price = $request->price;
        $room->save();
        // return back();
        return redirect()->route("dashboard");
    }
    public function room_delete(Room $room){
        if(Auth::user()->role !== "admin"){
            return redirect()->route("dashboard");
        }
        $room->delete();
        // return back();
        return redirect()->route("dashboard");
    }
}
