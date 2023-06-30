@extends('backend/backendLayout')
@section('content')

<!--- Begin Page Content --->
<div class="container-fluid">
    <!--- Data Table --->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Room
                <a href="{{url('admin/room')}}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>

        <div class="card-body">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class="text-danger">{{$error}}</p>
                @endforeach
            @endif

            @if(Session::has('success'))
                <p class="text-success">{{session('success')}}</p>
            @endif

            <div class="table-responsive">
                <form enctype="multipart/form-data" method="post" action="{{url('admin/room')}}">
                @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Select Room Type</th>
                            <td>
                                <select name="rt_id" class="form-control">
                                    <option value="0">---- Select ----</option>
                                        @foreach($roomtype as $rt)
                                            <option value="{{$rt->id}}">{{$rt->type}}</option> 
                                        @endforeach
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th>Title</th>
                            <td><input name="title" type="text" class="form-control"></td>
                        </tr>

                        <tr>
                            <th>Description</th>
                            <td><textarea name="description" class="form-control"></textarea></td>
                        </tr>

                        <tr>
                            <th>Bed</th>
                            <td><input name="bed" type="text" class="form-control"></td>
                        </tr>

                        <tr>
                            <th>Pax</th>
                            <td><input name="pax" type="text" class="form-control"></td>
                        </tr>

                        <tr>
                            <th>Amenities</th>
                            <td class="amenities">
                                <input type="checkbox" name="amenities[]" value="Air Conditioning">Air Conditioning
                                <input type="checkbox" name="amenities[]" value="Iron">Iron/Ironing Board
                                <input type="checkbox" name="amenities[]" value="Minibar">Minibar
                                <input type="checkbox" name="amenities[]" value="Hair Dryer">Hair Dryer
                                <input type="checkbox" name="amenities[]" value="Sofa">Sofa
                                <input type="checkbox" name="amenities[]" value="Laundry Service">Laundry Service
                                <input type="checkbox" name="amenities[]" value="Slippers">Slippers
                                <input type="checkbox" name="amenities[]" value="Drink Facility">Tea and Coffee Maker
                                <input type="checkbox" name="amenities[]" value="Balcony">Balcony
                            </td>
                        </tr>

                        <tr>
                            <th>Price</th>
                            <td><input name="price"class="form-control"></td>
                        </tr>

                        <tr>
                            <th>Gallery</th>
                            <td><input type="file" multiple name="roomImgs[]"></td>
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

<style>
    .amenities {
        display: grid;
        grid-template-columns: repeat(4,minmax(150px,1fr));
        align-items: center;
        font-size: 14px;
    }
</style>

@endsection