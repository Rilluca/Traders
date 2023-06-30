<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Traders - Admin Login</title>

        <!-- Custom fonts for this template-->
        <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="/css/sb-admin-2.min.css" rel="stylesheet">
        <link href="/css/backend/style-admin-login.css" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <div class="screen">
                <div class="screen-content">
                    <div class="admin-login-title">
                        <h1>Admin <br> Log In</h1>
                    </div>

                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <p class="text-danger error-msg1">Please Fill In Username and Password</p>
                        @endforeach
                    @endif

                    @if(Session::has('msg'))
                        <p class="text-danger error-msg2">{{session('msg')}}</p>
                    @endif

                    <form class="login" method="POST" action="{{url('admin/login')}}">
                    @csrf
                        <div class="login-field">
                            <i class="login-icon fas fa-user"></i>
                            <input type="text" @if(Cookie::has('adminuser')) value="{{Cookie::get('adminuser')}}" @endif id="username" name="username" class="login-input" placeholder="Username">
                        </div>

                        <div class="login-field">
                            <i class="login-icon fas fa-lock"></i>
                            <input type="password" @if(Cookie::has('adminpwd')) value="{{Cookie::get('adminpwd')}}" @endif name="password" class="login-input" placeholder="Password">
                        </div>

                        <div class="rmbcheckbox">
                            <input type="checkbox" @if(Cookie::has('adminuser')) checked @endif name="rememberme" class="custom-checkbox" id="rmbCheck">
                            <label class="RmbMeLabel" for="rmbCheck">Remember Me</label>
                        </div>

                        <div class="forgot-password">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>

                        <button class="button login-submit">
                            <span class="button-text">Log In</span>
                            <i class="button-icon fas fa-chevron-right"></i>
                        </button>		
                    </form>
                </div>

                <div class="screen-background">
                    <span class="screen-background-shape screen-background-shape4"></span>
                    <span class="screen-background-shape screen-background-shape3"></span>
                    <span class="screen-background-shape screen-background-shape2"></span>
                    <span class="screen-background-shape screen-background-shape1"></span>
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
    </body>

</html>