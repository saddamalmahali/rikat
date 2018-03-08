<!-- Top Navigation -->
<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
        <!-- Logo -->
        <div class="top-left-part">
            <a class="logo" href="index.html">
                <!-- Logo icon image, you can use font-icon also --><b><i class="fa fa-search"></i></b>
                <!-- Logo text image you can use text also --><span class="hidden-xs"><strong>R I K A T</strong></span> </a>
        </div>
        <!-- /Logo -->
        <!-- This is for mobile view search and menu icon -->
        <ul class="nav navbar-top-links navbar-left hidden-xs">
            <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
        </ul>
        <!-- This is the message dropdown -->
        <ul class="nav navbar-top-links navbar-right pull-right">
            
            
            <!-- /.dropdown -->
            <li class="dropdown">
            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="{{auth()->user()->foto ? '' : url('/images/blank-profile.png')}}" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">{{auth()->user()->name}}</b> </a>
                <ul class="dropdown-menu dropdown-user animated flipInY">
                    <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                    <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                    <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                    <li role="separator" class="divider"></li>
                    
                    <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout').submit()"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
        </ul>
    </div>
    <form action="{{url('/logout')}}" id="logout" method="POST">
        {{csrf_field()}}
    </form>
    <!-- /.navbar-header -->
    <!-- /.navbar-top-links -->
    <!-- /.navbar-static-side -->
</nav>
<!-- End Top Navigation -->