<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Dashboard</title>

        

        <!-- Custom fonts for this template-->
        <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="/css/sb-admin-2.min.css" rel="stylesheet">

        <!-- Custom styles CSS (backend)-->
        <link rel="stylesheet" href="/css/backend/style-backend.css">
    </head>

    <body id="page-top">
        <!--- Page Wrapper --->
        <div id="wrapper">
            <!--- Sidebar --->
            <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">
                <!--- Sidebar - Brand --->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('admin/dashboard')}}">
                    <div clsas="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-hotel"></i>
                    </div>

                    <div class="sidebar-brand-text mx-3">Traders</div>
                </a>

                <!--- Divider --->
                <hr class="sidebar-divider my-0">

                <!--- Nav Item - Dashboard --->
                <li class="nav-item">
                    <a class="nav-link" href="{{url('admin/dashboard')}}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!--- Divider --->
                <hr class="sidebar-divider">

                <!--- Heading --->
                <div class="sidebar-heading">
                    Masters
                </div>

                <!--- Nav Item - Pages Collapse Menu --->
                <!--- Room Types --->
                <li class="nav-item">
                    <a class="nav-link @if(!request()->is('admin/roomtype*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#roomType" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-home"></i>
                        <span>Room Type</span>
                    </a>

                    <div id="roomType" class="collapse @if(request()->is('admin/roomtype*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{url('admin/roomtype/create')}}">Add New</a>
                            <a class="collapse-item" href="{{url('admin/roomtype')}}">View All</a>
                        </div>
                    </div>
                </li>

                <!--- Room --->
                <li class="nav-item">
                    <a class="nav-link @if(!request()->is('admin/room*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#room" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-box"></i>
                        <span>Room</span>
                    </a>

                    <div id="room" class="collapse @if(request()->is('admin/room*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{url('admin/room/create')}}">Add New</a>
                            <a class="collapse-item" href="{{url('admin/room')}}">View All</a>
                        </div>
                    </div>
                </li>

                <!--- Customer --->
                <li class="nav-item">
                    <a class="nav-link @if(!request()->is('admin/customer*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#customer"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Customer</span>
                    </a>

                    <div id="customer" class="collapse @if(request()->is('admin/customer*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{url('admin/customer/create')}}">Add New</a>
                            <a class="collapse-item" href="{{url('admin/customer')}}">View All</a>
                        </div>
                    </div>
                </li>

                <!--- Booking --->
                <li class="nav-item">
                    <a class="nav-link @if(!request()->is('admin/booking*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#booking"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-hotel"></i>
                        <span>Booking</span>
                    </a>

                    <div id="booking" class="collapse @if(request()->is('admin/booking/create')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{url('admin/booking/create')}}">Add New</a>
                            <a class="collapse-item" href="{{url('admin/booking')}}">View All</a>
                        </div>
                    </div>
                </li>

                <!--- Logout --->
                <li class="nav-item">
                    <a class="nav-link" href="{{url('admin/logout')}}">
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
            <!--- End of Sidebar --->

            <!--- Content Wrapper --->
            <div id="content-wrapper" class="d-flex flex-column">
                <!--- Main Content --->
                <div id="content">
                    <!--- Top bar --->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <!--- Sidebar Toggle (Topbar) --->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!--- Topbar Navbar --->
                        <ul class="navbar-nav ml-auto">
                            <!--- Nav Item - Alerts --->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-fw"></i>
                                    <span class="badge badge-danger badge-counter">3+</span>
                                </a>

                                <!-- Dropdown - Alerts -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">Alerts Center</h6>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-primary">
                                                <i class="fas fa-file-alt text-white"></i>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="small text-gray-500">June 27, 2022</div>
                                            <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                        </div>
                                    </a>

                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-success">
                                                <i class="fas fa-donate text-white"></i>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="small text-gray-500">June 25, 2019</div>
                                            $200.99 has been deposited into your account - Room Deposit!
                                        </div>
                                    </a>

                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-warning">
                                                <i class="fas fa-exclamation-triangle text-white"></i>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="small text-gray-500">June 25, 2022</div>
                                            High Demand Alert: We've noticed high demand of room booking today!
                                        </div>
                                    </a>
                                    
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                </div>
                            </li>

                            <!-- Nav Item - Messages -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-envelope fa-fw"></i>
                                    <!-- Counter - Messages -->
                                    <span class="badge badge-danger badge-counter">3</span>
                                </a>

                                <!-- Dropdown - Messages -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                    <h6 class="dropdown-header">Message Center</h6>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="/images/backend/undraw_profile_1.svg" alt="...">
                                            <div class="status-indicator bg-success"></div>
                                        </div>

                                        <div class="font-weight-bold">
                                            <div class="text-truncate">Hi there! I am wondering is there is a discount in this week?</div>
                                            <div class="small text-gray-500">Caitlyn Yeoh · 58m</div>
                                        </div>
                                    </a>

                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="/images/backend/undraw_profile_2.svg" alt="...">
                                            <div class="status-indicator"></div>
                                        </div>
                                        
                                        <div>
                                            <div class="text-truncate">Is there any free parking or need to pay?</div>
                                            <div class="small text-gray-500">James Harden · 1d</div>
                                        </div>
                                    </a>

                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="/images/backend/undraw_profile_3.svg" alt="...">
                                            <div class="status-indicator bg-warning"></div>
                                        </div>

                                        <div>
                                            <div class="text-truncate">The room is quite comfort for my family! We have a nice sleep yesterday</div>
                                            <div class="small text-gray-500">Lux · 2d</div>
                                        </div>
                                    </a>
                                    
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                                </div>
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Rillu</span>
                                    <img class="img-profile rounded-circle" src="/images/backend/profile.png">
                                </a>

                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>

                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Settings
                                    </a>

                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Activity Log
                                    </a>
                                    
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{url('admin/logout')}}" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <!--- End of Topbar --->

                    @yield('content')

                </div>
                <!--- End of Main Content --->
            </div>
            <!--- End of Content Wrapper --->
        </div>
        <!---End of Page Wrapper --->

        <!--- Footer --->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Traders</span>
                </div>
            </div>
        </footer>
        <!--- End of Footer --->

        <!--- Scroll to Top Button --->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="/vendor/jquery/jquery.min.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="/js/sb-admin-2.min.js"></script>

        @yield('scripts')

    </body>
</html>