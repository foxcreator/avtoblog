<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <link href="{{ asset('assets/img/front/logoforblog.png') }}" rel="icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
          href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/colorbox.css') }}">

    <script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- TinyMCE text -->
    <script src="https://cdn.tiny.cloud/1/vf1hunsd4mg70adqioziqe2ttykrqnup4xafl5xhnz527lxk/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>
{{--    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>--}}


</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @if (session('success'))
        <script>
            $(document).ready(function () {
                toastr.success("{{ session('success') }}");
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            $(document).ready(function () {
                toastr.error("{{ session('error') }}");
            });
        </script>
    @endif
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('home') }}" class="nav-link" target="_blank">Front</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                   aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{ route('admin.dashboard') }}" class="brand-link">
            <img src="{{ asset('assets/img/logoforblogAdmin.png') }}" alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">AvtoBlog Admin</span>
        </a>

        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    @if(auth()->user()->avatar)
                        <img src="{{ auth()->user()->avatar }}" class="img-circle elevation-2" alt="User Image">
                    @else
                        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                             alt="User Image">
                    @endif

                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                </div>
            </div>

            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                           aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Posts
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.posts.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create post</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.posts.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All posts</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @if(auth()->user()->hasRole('admin'))
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Users
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create user</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.users.all') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All users</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Categories
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.categories.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create category</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.categories.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Categories</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">

                    <li class="nav-header"></li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle text-danger"></i>
                            <p class="text">Logout</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    @yield('content')

    <footer class="main-footer">
        <strong>Copyright &copy; 2021-{{ \Carbon\Carbon::now()->year }} <a href="/">BSV Develop</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0.0
        </div>
    </footer>
</div>

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('assets/js/admin.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('dist/js/jquery.colorbox.js') }}"></script>
<script type="text/javascript" src="{{ asset('packages/barryvdh/elfinder/js/standalonepopup.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
</body>
</html>

