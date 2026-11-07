<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route("login");
});

Route::get('/register', [UserController::class, 'registerForm'])->name("register");
Route::post('/register', [UserController::class, 'register']);

Route::get('/login', [UserController::class, 'loginForm'])->name("login");
Route::post('/login', [UserController::class, 'login']);

Route::post('/logout', [UserController::class, 'logout'])->name("logout");

Route::get('/dashboard', [DashboardController::class, 'index'])->name("dashboard");

Route::get('/room/create', [RoomController::class, 'room_add'])->name("room.create")->middleware("auth");
Route::post('/room/store', [RoomController::class, 'room_addform'])->name("room.store")->middleware("auth");
Route::delete('/room/{room}', [RoomController::class, 'room_delete'])->name("room.delete")->middleware("auth");

Route::get('/booking/create', [BookingController::class, 'booking_add'])->name("booking.create")->middleware("auth");
Route::post('/booking/store', [BookingController::class, 'booking_addform'])->name("booking.store")->middleware("auth");
Route::get('/booking/my', [BookingController::class, 'booking_list'])->name("booking.my")->middleware("auth");
Route::get('/booking/admin', [BookingController::class, 'booking_admin'])->name("booking.admin")->middleware("auth");
Route::post('/booking/{booking}/status', [BookingController::class, 'booking_update_status'])->name("booking.update_status")->middleware("auth");
Route::post('/booking/{booking}/review', [BookingController::class, 'booking_review'])->name("booking.review")->middleware("auth");
