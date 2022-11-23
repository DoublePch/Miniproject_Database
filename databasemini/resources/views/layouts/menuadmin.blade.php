 <!-- Sidenav -->
 <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="{{ asset('assets') }}/img/brand/logos.png" class="navbar-brand-img" alt="Logo">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">

                    @if (request()->routeIs('redirect'))

                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('redirect') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">หน้าหลัก</span>
                        </a>
                    </li>

                    @else

                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('redirect') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">หน้าหลัก</span>
                        </a>
                    </li>

                    @endif
                    @if (request()->routeIs('addcar'))

                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('addcar') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">จัดการรถ</span>
                        </a>
                    </li>

                    @else

                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('addcar') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">จัดการรถ</span>
                        </a>
                    </li>

                    @endif

            


                    @if (request()->routeIs('booking'))

                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('booking') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">ข้อมูลการจอง</span>
                        </a>
                    </li>

                    @else

                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('booking') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">ข้อมูลการจอง</span>
                        </a>
                    </li>

                    @endif

                </ul>


            </div>
        </div>
    </div>
</nav>
<!-- Main content -->
<div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-gradient-success border-bottom">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Search form -->

                <!-- Navbar links -->
                <ul class="navbar-nav align-items-center  ml-md-auto ">
                    <li class="nav-item d-xl-none">
                        <!-- Sidenav toggler -->
                        <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item d-sm-none">
                        <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                            <i class="ni ni-zoom-split-in"></i>
                        </a>
                    </li>


                </ul>
                <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                                ยินดีต้อนรับ:

                                <div class="media-body  ml-2  d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold"> {{Auth::user()->role}}&nbsp;{{ Auth::user()->fname }}&nbsp;{{ Auth::user()->lname }}</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu  dropdown-menu-right ">
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">ออกจากระบบ</h6>
                            </div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }} " class="dropdown-item" onclick="event.preventDefault();
                                              this.closest('form').submit();">


                            </form>

                            <i class="ni ni-user-run"></i>
                            <span>ออกจากระบบ</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header -->
    <!-- Header -->

    <div class="header bg-gradient-success pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">

                                @if (request()->routeIs('redirect'))
                                <li class="breadcrumb-item"><a href="{{ route('redirect') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('redirect') }}">หน้าหลัก</a></li>
                                @else

                                @endif
                                @if (request()->routeIs('addcar'))
                                <li class="breadcrumb-item"><a href="{{ route('redirect') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('redirect') }}">หน้าหลัก</a></li>
                                @else

                                @endif




                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    @include('include.content')


</div>
</div>