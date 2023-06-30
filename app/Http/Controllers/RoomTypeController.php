<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;

class RoomTypeController extends Controller
{
    function create() {
        return view('backend.room-type.create');
    }

    public function index() {
        $data=RoomType::all();
        return view('backend.room-type.index',['data'=>$data]);
    }

    public function store(Request $request) {
        $request->validate([
            'type'=>'required',
        ]);

        $data=new RoomType;
        $data->type=$request->type; //this "type" must match with the create.blade.php type name
        $data->save();
       
        return redirect('admin/roomtype/create')->with('success','Data has been added.');
    }

    public function edit($id) {
        $data=RoomType::find($id);
        return view('backend.room-type.edit',['data'=>$data]);
    }

    public function update(Request $request, $id) {
        $data=RoomType::find($id);
        $data->type=$request->type; 
        $data->save();

        return redirect('admin/roomtype/'.$id.'/edit')->with('success','Data has been updated.');
    }

    public function delete($id) {
        RoomType::where('id',$id)->delete();
        return redirect('admin/roomtype')->with('success','Data has been deleted.');
    }
}
