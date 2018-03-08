<!-- Left navbar-header -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <ul class="nav" id="side-menu">
            <li class="nav-small-cap m-t-10"> &nbsp;&nbsp;&nbsp;&nbsp;Main Menu</li>
            <li> 
                <a href="{{url('/home')}}">
                    <i class="fa fa-home fa-fw" data-icon="v"></i> 
                    <span class="hide-menu">
                        Beranda
                    </span>                    
                </a> 
            </li>
            <li class="nav-small-cap m-t-10"> &nbsp;&nbsp;&nbsp;&nbsp;Master Data</li>
            <li> 
                <a href="{{url('/admin/master/kategori')}}" class="{{Route::currentRouteName() == 'admin.master.kategori.index' ? 'active' : ''}}">
                    <i class="fa fa-code-fork fa-fw" data-icon="v"></i>
                    <span class="hide-menu">
                        Kategori
                    </span>                    
                </a> 
            </li>
        </ul>
    </div>
</div>
<!-- Left navbar-header end -->