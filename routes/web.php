<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/register', [UserController::class, 'registerForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);

Route::get('/login', [UserController::class, 'loginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    $rooms = \App\Models\Room::all();
    return view('dashboard', compact('rooms'));
})->middleware('auth')->name('dashboard');

Route::get('/room/create', [RoomController::class, 'create'])->name('room.create')->middleware('auth');
Route::post('/room/store', [RoomController::class, 'store'])->name('room.store')->middleware('auth');
Route::delete('/room/{room}', [RoomController::class, 'destroy'])->name('room.destroy')->middleware('auth');

Route::get('/booking/create', [BookingController::class, 'create'])->name('booking.create')->middleware('auth');
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store')->middleware('auth');
Route::get('/booking/my', [BookingController::class, 'myBookings'])->name('booking.my')->middleware('auth');
Route::get('/booking/admin', [BookingController::class, 'index'])->name('booking.admin')->middleware('auth');
Route::post('/booking/{booking}/status', [BookingController::class, 'updateStatus'])->name('booking.updateStatus')->middleware('auth');
Route::post('/booking/{booking}/review', [BookingController::class, 'storeReview'])->name('booking.storeReview')->middleware('auth');
