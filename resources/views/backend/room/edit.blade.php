@extends('backend/backendLayout')
@section('content')

<!--- Begin Page Content --->
<div class="container-fluid">
    <!--- Data Table --->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Room
                <a href="{{url('admin/room')}}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>

        <div class="card-body">
            @if(Session::has('success'))
                <p class="text-success">{{session('success')}}</p>
            @endif

            @php
                $amenities = json_decode($data->amenities);
            @endphp

            <div class="table-responsive">
                <form enctype="multipart/form-data" method="POST" action="{{url('admin/room/'.$data->id)}}">
                @csrf
                    @method('put')
                    <table class="table table-bordered">
                        <tr>
                            <th>Room Type</th>
                            <td>
                                <select name="rt_id" class="form-control">
                                    <option value="0">---- Select ----</option>
                                        @foreach($roomtype as $rt)
                                            <option @if($data->room_type_id==$rt->id) selected @endif value="{{$rt->id}}">{{$rt->type}}</option> 
                                        @endforeach
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th>Title</th>
                            <td><input name="title" type="text" class="form-control" value="{{$data->title}}"></td>
                        </tr>

                        <tr>
                            <th>Description</th>
                            <td><textarea name="description" class="form-control">{{$data->description}}</textarea></td>
                        </tr>

                        <tr>
                            <th>Bed</th>
                            <td><input name="bed" type="text" class="form-control" value="{{$data->bed}}"></td>
                        </tr>

                        <tr>
                            <th>Pax</th>
                            <td><input name="pax" type="text" class="form-control" value="{{$data->pax}}"></td>
                        </tr>

                        <tr>
                            <th>Amenities</th>
                            <td class="amenities">
                                <input type="checkbox" class="amenities_checkbox "name="amenities[]" value="Air Conditioning"{{ in_array('AirConditioning',$amenities)? 'checked':'' }}>Air Conditioning
                                <input type="checkbox" class="amenities_checkbox "name="amenities[]" value="Iron"{{ in_array('Iron',$amenities)? 'checked':'' }}>Iron/Ironing Board
                                <input type="checkbox" class="amenities_checkbox "name="amenities[]" value="Minibar" {{ in_array('Minibar',$amenities)? 'checked':'' }}>Minibar
                                <input type="checkbox" class="amenities_checkbox "name="amenities[]" value="Balcony"{{ in_array('Balcony',$amenities)? 'checked':'' }}>Balcony
                                <input type="checkbox" class="amenities_checkbox "name="amenities[]" value="Hair Dryer" {{ in_array('HairDryer',$amenities)? 'checked':'' }}>Hair Dryer
                                <input type="checkbox" class="amenities_checkbox "name="amenities[]" value="Sofa" {{ in_array('Sofa',$amenities)? 'checked':'' }}>Sofa
                                <input type="checkbox" class="amenities_checkbox "name="amenities[]" value="Laundry Service" {{ in_array('LaundryService',$amenities)? 'checked':'' }}>Laundry Service
                                <input type="checkbox" class="amenities_checkbox "name="amenities[]" value="Slippers" {{ in_array('Slippers',$amenities)? 'checked':'' }}>Slippers
                                <input type="checkbox" class="amenities_checkbox "name="amenities[]" value="Drink Facility" {{ in_array('DrinkFacility',$amenities)? 'checked':'' }}>Tea and Coffee Maker
                            </td>
                        </tr>

                        <tr>
                            <th>Price</th>
                            <td><input name="price"class="form-control" value="{{$data->price}}"></td>
                        </tr>

                        <tr>
                            <th>Gallery</th>
                            <td>
                                <table class="table table-bordered mt-3">
                                    <tr>
                                        <input type="file" multiple name="roomImgs[]"> 
                                            @foreach($data->roomImgs as $img)
                                                <td class="imgcol{{$img->id}}">
                                                    <img width="150" height="100" src="{{asset('storage/room/'.$img->img_src)}}" />
                                                    <p class="mt-2">
                                                        <button type="button" onclick="return confirm('Are you sure you want to delete this image??')" class="btn btn-danger btn-sm delete-image" data-image-id="{{$img->id}}"><i class="fa fa-trash"></i></button>
                                                    </p>
                                                </td>
                                            @endforeach
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    
                        <tr>
                            <td colspan="2">
                                <input type="submit" class="btn btn-primary">
                            </td> 
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $(".delete-image").on('click',function(){
            var _img_id=$(this).attr('data-image-id');
            var _vm=$(this);
            $.ajax({
                url:"{{url('admin/roomimage/delete')}}/"+_img_id,
                dataType:'json',
                beforeSend:function(){
                    _vm.addClass('disabled');
                },
                success:function(res){
                    if(res.bool==true){
                        $(".imgcol"+_img_id).remove();
                    }
                    _vm.removeClass('disabled');
                }
            });
        });
    });
</script>
@endsection

<style>
    .amenities {
        display: grid;
        grid-template-columns: repeat(4,minmax(150px,1fr));
        align-items: center;
        font-size: 14px;
    }
</style>

@endsection