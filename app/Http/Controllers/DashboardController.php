<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $rooms = Room::all();
        return view("dashboard", compact("rooms"));
    }
}
