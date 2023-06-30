@extends('backend/backendLayout')
@section('content')

<!--- Begin Page Content --->
<div class="container-fluid">
    <!--- Data Table --->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Booking Details
                <a href="{{url('admin/booking')}}" class="float-right btn btn-success btn-sm">View All</a>
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
                <form enctype="multipart/form-data" method="GET" action="{{url('admin/booking/'.$data->id)}}">
                    @method('put')
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Select Customer <span class="text-danger">*</span></th>
                            <td>
                                <select class="form-control" name="customer_id">
                                    @foreach($customers as $c)
                                        <option @if($data->customer_id==$c->id) selected @endif value="{{$c->id}}">{{$c->full_name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th>Check-in Date <span class="text-danger">*</span></th>
                            <td><input name="checkin_date" type="date" id="checkin_date" class="form-control checkin-date" /></td>
                        </tr>

                        <tr>
                            <th>Check-out Date <span class="text-danger">*</span></th>
                            <td><input name="checkout_date" type="date" id="checkout_date" class="form-control" /></td>
                        </tr>

                        <tr>
                            <th>Available Rooms <span class="text-danger">*</span></th>
                            <td><select class="form-control room-list" name="room_id"></select></td>
                        </tr>

                        <tr>
                            <th>Total Adults <span class="text-danger">*</span></th>
                            <td><input name="total_adults" type="text" class="form-control"></td>
                        </tr>

                        <tr>
                            <th>Total Children</th>
                            <td><input name="total_children" type="text" class="form-control"></td>
                        </tr>     

                        <tr>
                            <tr>
                                <th> Price:</th>
                                <td><p><span class="show-room-price"></span></p></td>
                            </tr>

                            <td colspan="2">
                                <input type="submit" class="btn btn-primary" />
                            </td> 
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection