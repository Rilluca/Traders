<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Room;
use App\Models\RoomImage;
use App\Models\Customer;
use App\Models\Booking;
use DB;

class HomeController extends Controller
{

    public function homepage() {
        $room=Room::all();
        $booking=Booking::all();
        return view('frontend.home',['room'=>$room,'booking'=>$booking]);
    }

    public function roomDetail(Request $request, $slug, $roomid) {
    	$roomDetail=Room::find($roomid);
        return view('frontend.viewRoom',['roomDetail'=>$roomDetail]);
    }

    public function contact() {
        return view('frontend.contact');
    }

    public function about() {
        return view('frontend.about');
    }

    public function room(){
        $room=Room::orderBy('id')->paginate(5);
        return view('frontend.room',['room'=>$room]);
    }

}