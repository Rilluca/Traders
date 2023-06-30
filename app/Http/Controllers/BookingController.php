<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\RoomType;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;

class BookingController extends Controller
{
    public function index() {
        $bookings=Booking::all();
        return view('backend.booking.index',['data'=>$bookings]);
    }

    public function create() {
        $customers=Customer::all();
        return view('backend.booking.create',['data'=>$customers]);
    }

    public function store(Request $request) {
        $request->validate([
            'customer_id'=>'required',
            'room_id'=>'required',
            'checkin_date'=>'required',
            'checkout_date'=>'required',
            'total_adults'=>'required',
            'total_children'=>'required',
        ]);

        if($request->ref=='front') {
            $sessionData=[
                'customer_id'=>$request->customer_id,
                'room_id'=>$request->room_id,
                'checkin_date'=>$request->checkin_date,
                'checkout_date'=>$request->checkout_date,
                'total_adults'=>$request->total_adults,
                'total_children'=>$request->total_children,
                'roomprice'=>($request->roomprice) * ($request->stayduration),
                'ref'=>$request->ref
            ];
            
            session($sessionData);
            \Stripe\Stripe::setApiKey('sk_test_51KAI1JEXSaRf5Y4PDQR9DeVL7vI8Tj503rN9cfoZjInsdC7w1zla5BwCOqmIjVkYLEMhrByC8NDfn7M2YFhJSrBa001PVMB7w4');
            $session = \Stripe\Checkout\Session::create([
                'line_items' => [[
                    'price_data' => [
                    'currency' => 'myr',
                    'product_data' => [
                    'name' => 'Traders Hotel Room Booking',
                    ],
                    'unit_amount' => (($request->roomprice) * ($request->stayduration) * 100),
                  ],
                  'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => 'http://localhost:8000/booking/success?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => 'http://localhost:8000/booking/fail',
            ]);

            return redirect($session->url);
        } else {
            $data=new Booking;
            $data->customer_id=$request->customer_id;
            $data->room_id=$request->room_id;
            $data->checkin_date=$request->checkin_date;
            $data->checkout_date=$request->checkout_date;
            $data->total_adults=$request->total_adults;
            $data->total_children=$request->total_children;
            $data->roomprice=($request->roomprice) * ($request->stayduration2);

            if($request->ref=='front') {
                $data->ref='customer';
            } else {
                $data->ref='admin';
            }

            $data->save();

            return redirect('admin/booking/create')->with('success','Data has been added.');
        }
    }

    public function show($id) {
        $data=Booking::find($id);
        return view('backend.booking.view',['data'=>$data]);
    }

    public function delete($id) {
        Booking::where('id',$id)->delete();
        return redirect('admin/booking')->with('success','Booking has been deleted.');
    }

    // Check available rooms
    function available_rooms(Request $request, $checkin_date){
        $arooms=DB::SELECT("SELECT * FROM rooms WHERE id NOT IN (SELECT room_id FROM bookings WHERE '$checkin_date' BETWEEN checkin_date AND checkout_date)");
       
        $data=[];
        foreach($arooms as $room) {
            $roomTypes=RoomType::find($room->room_type_id);
            $data[]=['room'=>$room,'roomtype'=>$roomTypes];
        }

        return response()->json(['data'=>$data]);
    }

    // Change Status
    public function changeStatus($id) {
        $getStatus = Booking::select('status')->where('id',$id)->first();

        if($getStatus->status==1) {
            $status = 0;
        } else {
            $status = 1;
        }

        Booking::where('id',$id)->update(['status'=>$status]);
        return redirect()->back();
    }

    public function booking() {
        $customers=Customer::all();
        return view('frontend.booking');
    }

    function booking_payment_success(Request $request) {
        \Stripe\Stripe::setApiKey('sk_test_51KAI1JEXSaRf5Y4PDQR9DeVL7vI8Tj503rN9cfoZjInsdC7w1zla5BwCOqmIjVkYLEMhrByC8NDfn7M2YFhJSrBa001PVMB7w4');
        $session = \Stripe\Checkout\Session::retrieve($request->get('session_id'));

        if($session->payment_status=='paid') {
            $data=new Booking;
            $data->customer_id=session('customer_id');
            $data->room_id=session('room_id');
            $data->checkin_date=session('checkin_date');
            $data->checkout_date=session('checkout_date');
            $data->total_adults=session('total_adults');
            $data->total_children=session('total_children');
            $data->roomprice=session('roomprice');

            if(session('ref')=='front') {
                $data->ref='customer';
            } else {
                $data->ref='admin';
            }
            $data->save();

           return view('backend.booking.success');
        }
    }

    function booking_payment_fail(Request $request) {
        return view('backend.booking.failure');
    }

    public function pdfReport(Request $request) {
        $customerid=$request->session()->get('customer_id');
        $booking=DB::table('bookings')
        ->leftjoin('customers','customers.id','=','bookings.customer_id')
        ->leftjoin('rooms','rooms.id','=','bookings.room_id')
        ->leftjoin('room_types', 'room_types.id', '=', 'rooms.room_type_id')
        ->select('bookings.*','rooms.title as roomTitle','bookings.roomprice as roomPrice','room_types.type as roomType', 'customers.id as cusID')
        ->where('bookings.customer_id','=',$customerid)
        ->orderby('id', 'DESC')
        ->take(1)
        ->get();
  
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('frontend.bookingInvoice', compact('booking'));
        return $pdf->download('Invoice.pdf');
    }

    public function edit($id) {
        $customers=Customer::all();
        $data= Booking::find($id);
        
        return view('backend.booking.edit',compact('data','customers'));
    }

    public function update(Request $request, $id) {
        $data=Booking::find($id);
        $data->customer_id=$request->customer_id;
        $data->room_id=$request->room_id;
        $data->checkin_date=$request->checkin_date;
        $data->checkout_date=$request->checkout_date;
        $data->total_adults=$request->total_adults;
        $data->total_children=$request->total_children;

        if($request->ref=='front') {
            $data->ref='customer';
        }else{
            $data->ref='admin';
        }

        $data->save();
        return redirect('admin/booking/'.$id.'/edit')->with('success','Data has been updated.');
    }

}