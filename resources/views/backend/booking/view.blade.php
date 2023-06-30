@extends('backend/backendLayout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Data Tables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">View Booking Details
                <a href="{{url('admin/booking')}}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <p style="font-weight: 800; font-size: 20px;">Customer Info</p>
                        <th>Full Name</th>
                        <td>{{$data->customer->full_name}}</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>{{$data->customer->email}}</td>
                    </tr>

                    <tr>
                        <th>Phone No.</th>
                        <td>{{$data->customer->mobile}}</td>
                    </tr>

                    <tr>
                        <th>Address</th>
                        <td>{{$data->customer->address}}</td>
                    </tr>
                </table>  

                <table class="table table-bordered">
                    <tr>
                        <p style="font-weight: 800; font-size: 20px;">Booking Info</p>
                        <th>Room Type</th>
                        <td>{{$data->room->roomtype->type}}</td>
                    </tr>

                    <tr>   
                        <th>Room Name</th>
                        <td>{{$data->room->title}}</td>
                    </tr>

                    <tr>
                        <th>Check-in Date</th>
                        <td>{{$data->checkin_date}}</td>
                    </tr>

                    <tr>
                        <th>Check-out Date</th>
                        <td>{{$data->checkout_date}}</td>
                    </tr>

                    <tr>
                        <th>Total Adults</th>
                        <td>{{$data->total_adults}}</td>
                    </tr>

                    <tr>
                        <th>Total Children</th>
                        <td>{{$data->total_children}}</td>
                    </tr>

                    <tr>
                        <th>Price</th>
                        <td>RM {{$data->roomprice}}</td>
                    </tr>
                    
                    <tr>
                        <th>Reference</th>
                        <td>{{$data->ref}}</td>
                    </tr>
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