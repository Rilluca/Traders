<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Booking;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index() {
        $data=Customer::all();
        return view('backend.customer.index',['data'=>$data]); 
    }

    public function create() {
        return view('backend.customer.create');
    }

    public function store(Request $request) {
        
        $request->validate([
            'full_name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'mobile'=>'required',
            'address'=>'required',
        ]);

        $data=new Customer;
        $data->full_name=$request->full_name;
        $data->email=$request->email;
        $data->password=sha1($request->password);
        $data->mobile=$request->mobile;
        $data->address=$request->address;
        $data->save();

        $ref=$request->ref;
        if($ref=='front') {
            return redirect('customer/register')->with('success','Congratulations! Account register sucessfully, please log in now.');;
        }
        
        return redirect('admin/customer/create')->with('success','Data has been added.');
    }


    public function show($id) {
        $data=Customer::find($id);
        return view('backend.customer.view',['data'=>$data]);
    }

    public function edit($id) {
        $data=Customer::find($id);
        return view('backend.customer.edit',['data'=>$data]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'full_name'=>'required',
            'email'=>'required|email',
            'mobile'=>'required',
        ]);

        $data=Customer::find($id);
        $data->full_name=$request->full_name;
        $data->email=$request->email;
        $data->password=sha1($request->password);
        $data->mobile=$request->mobile;
        $data->address=$request->address;
        $data->save();
      
        return redirect('admin/customer/'.$id.'/edit')->with('success','Data has been updated.');
    }

    public function delete($id) {
        Customer::where('id',$id)->delete();
        return redirect('admin/customer')->with('success','Data has been deleted.');
    }

    // Customer Login
    public function login(){
        return view('frontend.login');
    }

    // Check Login
    public function customer_login(Request $request) {
        $email=$request->LogInEmail;
        $pwd=sha1($request->LogInPassword);
        $detail=Customer::where(['email'=>$email,'password'=>$pwd])->count();

        if($detail>0) {
            $detail=Customer::where(['email'=>$email,'password'=>$pwd])->get();
            session(['customerlogin'=>true,'data'=>$detail]);
            return redirect('home');
        } else {
            return redirect('customer/login')->with('error','Invalid email/password!');
        }
    }
    
    // Customer Register
    public function register(){
        return view('frontend.register');
    }

    // Customer Logout
    public function logout(){
        session()->forget(['customerlogin','data']);
        return redirect('customer/login');
    }

}
