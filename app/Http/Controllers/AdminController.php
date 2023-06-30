<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Cookie;
use App\Models\Admin;
use App\Models\Booking;

class AdminController extends Controller
{
    function viewLogin() {
        return view('backend/admin-login');
    }

    // Check Login
    function checkLogin(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);

        $admin=Admin::where(['username'=>$request->username,'password'=>md5($request->password)])->count();
        
        if($admin>0) {
            $adminData=Admin::where(['username'=>$request->username,'password'=>md5($request->password)])->get();
            session(['adminData'=>$adminData]);

            if($request->has('rememberme')){ 
                Cookie::queue('adminuser',$request->username,60); 
                Cookie::queue('adminpwd',$request->password,60); 
            }
                return redirect('admin/dashboard');  
        } else {
            return redirect('admin/login')->with('msg','Invalid username/Password!');
        }
    }

    // Logout
    function logout(){
        session()->forget(['adminData']);
        return redirect('admin/login');
    }

    // Chart function
    function dashboard(){
        $bookingHistory=Booking::all();
        $bookings=Booking::selectRaw('count(id) as total_bookings,checkin_date')->groupBy('checkin_date')->get();
        $labels=[];
        $data=[];
        foreach($bookings as $booking) {
            $labels[]=$booking['checkin_date'];
            $data[]=$booking['total_bookings'];
        }

        // For Pie Chart
        $rtbookings=DB::table('room_types as rt')
            ->join('rooms as r','r.room_type_id','=','rt.id')
            ->join('bookings as b','b.room_id','=','r.id')
            ->select('rt.*','r.*','b.*',DB::raw('count(b.id) as total_bookings'))
            ->groupBy('r.room_type_id')
            ->get();
        $plabels=[];
        $pdata=[];
        foreach($rtbookings as $rbooking) {
            $plabels[]=$rbooking->type;
            $pdata[]=$rbooking->total_bookings;
        }

        return view('backend.admin-dashboard',['labels'=>$labels,'data'=>$data,'plabels'=>$plabels,'pdata'=>$pdata],['bookingdata'=>$bookingHistory ]);
    }
}