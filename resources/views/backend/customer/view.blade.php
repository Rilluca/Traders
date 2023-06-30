@extends('backend/backendLayout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Data Tables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">View Customer Details
                <a href="{{url('admin/customer')}}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Full Name</th>
                        <td>{{$data->full_name}}</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>{{$data->email}}</td>
                    </tr>

                    <tr>
                        <th>Phone No.</th>
                        <td>{{$data->mobile}}</td>
                    </tr>

                    <tr>
                        <th>Address</th>
                        <td>{{$data->address}}</td>
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