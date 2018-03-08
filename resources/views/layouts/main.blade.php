
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="RIKAT || Sistem Pelaporan Infrastruktur Publik">
    <meta name="author" content="Saddam Almahali">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('/plugins/images/favicon.png')}}">
    <title>RIKAT || Sistem Pelaporan Infrastruktur Publik</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{url('/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css')}}" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="{{url('/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
    <!-- Animation CSS -->
    <link href="{{url('/css/animate.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{url('/css/style.css')}}" rel="stylesheet">
    <!-- color CSS you can use different color css from css/colors folder -->
    <!-- We have chosen the skin-blue (blue.css) for this starter
          page. However, you can choose any other skin from folder css / colors .
-->
    <link href="{{url('/css/colors/blue.css')}}" id="theme" rel="stylesheet">
    @yield('style')
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
    <div id="wrapper">
        @include('layouts.top')
        @include('layouts.left')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">@yield('title_page')</h4> 
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        @yield('breadcrumb')
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                @yield('content')
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Mobidu Sinergi. Developed by <a href="https://itsinergi.id">IT Sinergi Team</a> </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
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
    @yield('script')
</body>

</html>
