
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rao vặt|AdminLTE 3 </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('dist/css/app.css') }}" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="https://raovat.vietpage.com/data/images/vietpage/category/classified/icon/mua-ban.png" />

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper" id="app">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">

        <!-- Right navbar links -->
        <!-- <ul class="navbar-nav ml-auto">


            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                    <i class="fa fa-th-large"></i>
                </a>
            </li>
        </ul> -->
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <!-- <a href="../../index3.html" class="brand-link">
            <img src="{{asset('assets/admin/default/admin.png')}}"
                 alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">{{Auth::user()->name}}</span> -->
            <ul>
            <li class="nav-item dropdown">
                <img src="{{asset('assets/admin/default/admin.png')}}"
                 alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>    
            </ul>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview">
                        <router-link to="/home" class="nav-link">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                Dashboard
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/category-list" class="nav-link">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                Category

                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/post-list"  class="nav-link">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                Post
                                <!-- <span class="right badge badge-danger">New</span> -->
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/user-list"  class="nav-link">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                User
                                <!-- <span class="right badge badge-danger">New</span> -->
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/uservip-list"  class="nav-link">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                UserVip
                                <!-- <span class="right badge badge-danger">New</span> -->
                            </p>
                        </router-link>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <admin-main></admin-main>
        <vue-progress-bar></vue-progress-bar>
    </div>
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2017-2021 <a href="https://www.facebook.com/imfat5">FullStack Web</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="{{ asset('dist/js/app.js') }}" defer></script>
</body>
</html>
