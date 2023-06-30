@extends('backend/backendLayout')
@section('content')

<!--- Page Content --->
<div class="container-fluid">
    <!--- Page Heading --->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!--- Content Row --->
    <div class="row">
        <!--- Bookings Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Bookings</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{App\Models\Booking::count()}}</div>
                        </div>

                        <div class="col-auto">
                            <i class="fas fa-hotel fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--- Customers Card --->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Customers</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{App\Models\Customer::count()}}</div>
                        </div>

                        <div class="col-auto">
                            <i class="fas fa-fw fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--- Rooms Card --->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Room</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{App\Models\Room::count()}}</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-auto">
                            <i class="fas fa-home fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--- Content Row --->
    <div class="row">
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">All Bookings
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
                                    <th>Name</th>
                                    <th style="max-width:70px">Check-in Date</th>
                                    <th style="max-width:70px">Check-out Date</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Customer</th>
                                    <th>Room Type</th>
                                    <th>Room Name</th>
                                    <th>Check-in Date</th>
                                    <th>Check-out Date</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>

                            <tbody>
                                @foreach($bookingdata as $booking)
                                    <tr>
                                        <td>{{$booking->id}}</td>
                                        <td>{{$booking->customer->full_name}}</td>
                                        <td style="max-width:20px;">{{$booking->room->roomtype->type}}</td>
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
    </div>

    <!--- Content Row --->
    <div class="row">
        <!--- Area Chart --->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Bookings Overview</h6>
                </div>

                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!--- Pie Chart --->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Room Type Bookings</h6>
                </div>

                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                </div>

                <div class="mt-4 text-center small">
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <!-- Custom styles for this page -->
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Page level plugins -->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/js/chart/datatables.js"></script>

    <!-- Page level plugins -->
    <script src="/vendor/chart.js/Chart.min.js"></script>

    <script type="text/javascript">
     //------------ Area Chart -------------
    var _labels={!! json_encode($labels) !!};
    var _data={!! json_encode($data) !!};

    //------------ Pie Chart -------------
    var _plabels={!! json_encode($plabels) !!};
    var _pdata={!! json_encode($pdata) !!};
    </script>

    <!-- Page level custom scripts -->
    <script src="/js/chart/chart-area.js"></script>
    <script src="/js/chart/chart-pie.js"></script>
@endsection

@endsection