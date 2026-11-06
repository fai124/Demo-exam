<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return $rooms;
    }

    public function create()
    {
        if (Auth::user()->login !== 'Conf2027') {
            return redirect()->route('dashboard');
        }

        return view('room.create');
    }

    public function store(RoomRequest $request)
    {
        if (Auth::user()->login !== 'Conf2027') {
            return redirect()->route('dashboard');
        }

        $room = new Room();
        $room->name = $request->name;
        $room->price = $request->price;
        $room->save();

        return redirect()->route('dashboard')->with('success', 'Зал создан');
    }

    public function destroy(Room $room)
    {
        if (Auth::user()->login !== 'Conf2027') {
            return redirect()->route('dashboard');
        }

        $room->delete();
        return redirect()->route('dashboard')->with('success', 'Зал удалён');
    }
}
