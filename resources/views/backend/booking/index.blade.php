@extends('backend/backendLayout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Data Tables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">View Bookings
                <a href="{{url('admin/booking/create')}}" class="float-right btn btn-success btn-sm">Add New</a>
            </h6>
        </div>

        <div class="card-body">
            @if(Session::has('success'))
                <p class="text-success">{{session('success')}}</p>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th style="max-width:50px">Room Type</th>
                            <th style="max-width:70px">Room Name</th>                                        
                            <th style="max-width:70px">Check-in Date</th>
                            <th style="max-width:70px">Check-out Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tfoot> 
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th style="max-width:50px">Room Type</th>
                            <th style="max-width:70px">Room Name</th>                                        
                            <th style="max-width:70px">Check-in Date</th>
                            <th style="max-width:70px">Check-out Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>

                    <tbody>
                        @foreach($data as $booking)
                            <tr>
                                <td>{{$booking->id}}</td>
                                <td>{{$booking->customer->full_name}}</td>
                                <td>{{$booking->room->roomtype->type}}</td>
                                <td>{{$booking->room->title}}</td> 
                                <td>{{$booking->checkin_date}}</td>
                                <td>{{$booking->checkout_date}}</td>
                                <td>
                                    @if($booking->status==1)
                                         <a href="{{url('admin/booking/change-status/'.$booking->id)}}" onclick="return confirm('Are you sure to change the booking status?')"class="btn btn-sm btn-danger">Checked In</a>
                                    @else
                                        <a href="{{url('admin/booking/change-status/'.$booking->id)}}" onclick="return confirm('Are you sure to change the booking status?')" class="btn btn-sm btn-success">Not Checked In</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('admin/booking/'.$booking->id).'/edit'}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="{{url('admin/booking/'.$booking->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                    <a href="{{url('admin/booking/'.$booking->id.'/delete')}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this data?')"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@section('scripts') <!--Call the jqeury plugin first from layout.blade.php-->
    <!-- Custom styles for this page -->
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Page level plugins -->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/js/chart/datatables.js"></script>
@endsection

@endsection