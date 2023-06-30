<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

// --- Backend --- //

// Admin Login
Route::get('admin/login', [AdminController::class,'viewLogin']);

Route::post('admin/login',[AdminController::class,'checkLogin']);

Route::get('admin/logout',[AdminController::class,'logout']);

// Admin Dashboard
Route::get('admin/dashboard', [AdminController::class,'dashboard'])->name('dashboard');

// Admin - Room Type
Route::resource('admin/roomtype',RoomTypeController::class);

Route::get('admin/roomtype/{id}/delete',[RoomTypeController::class,'delete']);

// Admin - Room
Route::resource('admin/room',RoomController::class);

Route::get('admin/room/{id}/delete',[RoomController::class,'delete']);

Route::get('admin/roomimage/delete/{id}',[RoomController::class,'delete_image']);

// Admin - Customer
Route::resource('admin/customer',CustomerController::class);

Route::get('admin/customer/{id}/delete',[CustomerController::class,'delete']);

// Admin - Booking
Route::resource('admin/booking',BookingController::class);

Route::get('admin/booking/{id}/delete',[BookingController::class,'delete']);

Route::get('admin/booking/available-rooms/{checkin_date}',[BookingController::class,'available_rooms']);

Route::get('admin/booking/change-status/{id}',[BookingController::class,'changeStatus'])->name('changeStatus');

// --- Frontend --- //
// Frontend - Home
Route::get('home',[HomeController::class,'homepage']);

// Home - Room
Route::get('room',[HomeController::class,'room']);

// Home - View Room
Route::get('/viewRoom/{slug}/{id}',[HomeController::class,'roomDetail'])->name('RoomDetail');

// Home - About
Route::get('about',[HomeController::class,'about']);

// Home - Contact
Route::get('contact',[HomeController::class,'contact']);

// Home - Login
Route::get('customer/login',[CustomerController::class,'login']);

Route::post('customer/login',[CustomerController::class,'customer_login']);

// Home - Register
Route::get('customer/register',[CustomerController::class,'register']);

// Home - Logout
Route::get('customer/logout',[CustomerController::class,'logout']);

// Home - Booking
Route::get('booking',[BookingController::class,'booking']);

// Home - Payment Failure
Route::get('booking/fail',[BookingController::class,'booking_payment_fail']);

// Home - Payment Success
Route::get('booking/success',[BookingController::class,'booking_payment_success']);

// Home - Download Invoice
Route::get('/pdfReport',[BookingController::class, 'pdfReport'])->name('pdfReport');