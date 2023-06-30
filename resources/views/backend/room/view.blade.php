@extends('backend/backendLayout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Data Tables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">View Room Details
                <a href="{{url('admin/room')}}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Room Type</th>
                        <td>{{$data->roomtype->type}}</td>
                    </tr>

                    <tr>
                        <th>Name</th>
                        <td>{{$data->title}}</td>
                    </tr>

                    <tr>
                        <th>Description</th>
                        <td>{{$data->description}}</td>
                    </tr>

                    <tr>
                        <th>Bed</th>
                        <td>{{$data->bed}}</td>
                    </tr>

                    <tr>
                        <th>Pax</th>
                        <td>{{$data->pax}}</td>
                    </tr>

                    <tr>
                        <th>Amenities</th>
                        <td class="amenities" style="width:600px">
                            @php
                                $amenities = json_decode($data->amenities)
                            @endphp

                            @foreach($amenities as $a)
                            <ul style="display:inline-block">
                                <li>{{$a}}</li>
                            </ul>        
                            @endforeach
                        </td>
                    </tr>

                    <tr>
                        <th>Price</th>
                        <td>RM {{$data->price}}</td>
                    </tr>

                    <tr>
                        <th>Gallery</th>
                        <td>
                            <table class="table table-bordered mt-3">
                                <tr>
                                    @foreach($data->roomimgs as $img)
                                    <td class="imgcol{{$img->id}}">
                                        <img width="150" height="100" src="{{asset('storage/room/'.$img->img_src)}}" />
                                    </td>
                                    @endforeach
                                </tr>
                            </table>
                        </td>
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