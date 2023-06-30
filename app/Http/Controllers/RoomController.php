<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\Room;
use App\Models\RoomImage;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    public function index() {
        $data=Room::all();
        return view('backend.room.index',['data'=>$data]);
    }

    public function create() {
        $roomtype=RoomType::all();
        return view('backend.room.create',['roomtype'=>$roomtype]);
    }

    public function store(Request $request) {
        $request->validate([
            'title'=>'required',
            'price'=>'required',
            'description'=>'required',
            'bed'=>'required',
            'pax'=>'required',
            'amenities'=>'required',
        ]);

        $data=new Room;
        $data->room_type_id=$request->rt_id;
        $data->title=$request->title;
        $data->description=$request->description;
        $data->bed=$request->bed;
        $data->pax=$request->pax;
        $data->amenities = json_encode($request->amenities);
        $data->price=$request->price;
        $data->save();

        $input = $request->all();
        if($request->hasFile('roomImgs')) {
            foreach($request->file('roomImgs') as $img) { 
                $extension = $img->getClientOriginalExtension();
                $reImage = $img->getClientOriginalName();
                $dest=public_path('storage/room');
                $img->move($dest,$reImage);

                $input['roomImgs'] = $reImage;

                $imgData=new RoomImage;
                $imgData->room_id=$data->id; 
                $imgData->img_src=$reImage;
                $imgData->img_alt=$request->title;
                $imgData->save();
        }
    }
        return redirect('admin/room/create')->with('success','Data has been added.');
    }

    public function show($id) {
        $data=Room::find($id);
        return view('backend.room.view',['data'=>$data]);
        
    }

    public function edit($id) {
        $roomtype=RoomType::all();
        $data= Room::find($id);
        
        return view('backend.room.edit',compact('data','roomtype'));
    }

    public function update(Request $request, $id) {
        $data= Room::find($id);
        $data->room_type_id=$request->rt_id;
        $data->title=$request->title; 
        $data->description=$request->description;
        $data->bed=$request->bed;
        $data->pax=$request->pax;
        $data->amenities = json_encode($request->amenities);
        $data->price=$request->price;
        $data->save();

        $input = $request->all();
        if($request->hasFile('roomImgs')){
        foreach($request->file('roomImgs') as $img) { 
            $extension = $img->getClientOriginalExtension();
            $reImage = $img->getClientOriginalName();
            $dest=public_path('storage/room');
            $img->move($dest,$reImage);

            $input['roomImgs'] = $reImage;

            $imgData=new RoomImage;
            $imgData->room_id=$data->id; 
            $imgData->img_src=$reImage;
            $imgData->img_alt=$request->title;
            $imgData->save();
        }
    }
        return redirect('admin/room/'.$id.'/edit')->with('success','Data has been updated.');
    }

    public function delete($id) {
        Room::where('id',$id)->delete();

        return redirect('admin/room')->with('success','Data has been deleted.');
    }

    public function delete_image($img_id) {
        $data=RoomImage::where('id',$img_id)->first();
        Storage::delete($data->img_src);

        RoomImage::where('id',$img_id)->delete();
        return response()->json(['bool'=>true]);
    }
}
