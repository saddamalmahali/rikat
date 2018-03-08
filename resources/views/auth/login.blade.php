<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="RIKAT || Sistem Pelaporan Infrastruktur Publik ">
    <meta name="author" content="Saddam Almahali">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>RIKAT || Sistem Pelaporan Infrastruktur Publik</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{url('/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css')}}" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{url('/css/animate.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{url('/css/style.css')}}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{url('/css/colors/blue.css')}}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="login-register">
        <div class="login-box">
            <div class="white-box">
                <form class="form-horizontal form-material" id="loginform" action="{{url('/login')}}" method="post">
                    {{csrf_field('')}}
                    <h2 class="box-title m-b-40"><center>MASUK KE RIKAT</center></h2>
                    <div class="form-group {{$errors->has('username') ? 'has-error' : ''}}">
                        <div class="col-xs-12">
                            <input class="form-control" name="username" value="{{old('username')}}" type="text" required="" placeholder="Username">
                            @if($errors->has('username'))
                                <span class="help-block">{{$errors->first('username')}}</span>    
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                        <div class="col-xs-12">
                            <input class="form-control" name="password" value="{{old('password')}}" type="password" required="" placeholder="Password">
                            @if($errors->has('password'))
                                <span class="help-block">{{$errors->first('password')}}</span>    
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup"> Remember me </label>
                            </div>
                            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Don't have an account? <a href="#" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- jQuery -->
    <script src="{{url('/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{url('/bootstrap/dist/js/tether.min.js')}}"></script>
    <script src="{{url('/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{url('/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js')}}"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="{{url('/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')}}"></script>
    <!--slimscroll JavaScript -->
    <script src="{{url('/js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{url('/js/waves.js')}}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{url('/js/custom.min.js')}}"></script>
    <!--Style Switcher -->
    <script src="{{url('/plugins/bower_components/styleswitcher/jQuery.style.switcher.js')}}"></script>
</body>

</html>
