<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Page</title>
    @laravelPWA
    <link rel="shortcut icon" type="image/x-icon" href="/image/kimwhite1.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/admin-template/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/admin-template/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('styles')

    <style>
        body {
            user-select: none;
        }

        .button-profil {
            background: transparent;
            border: none;
            padding: 1px 1px 1px 1px;
        }

        .button-profil:hover {
            background: transparent;
        }
    </style>

</head>

<body class="hold-transition sidebar-mini" style="background: whitesmoke;">
    <!-- Modal Logout -->
    <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="logoutLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div>
                        <h4 style="display: flex; justify-content: center;">Apakah Anda Yakin Ingin Logout?</h4>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                    <a onclick="event.preventDefault();document.getElementById('logout-form').submit()" href="{{ route('logout') }}" role="button" type="button" class="btn btn-secondary">Iya!</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background: whitesmoke;">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                {{-- <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li> --}}
                <li class="ml-2">
                    @yield('welcome')
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mt-2 mr-3">
                    @yield('date')
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <div class="dropstart">
                        <img src="/image/administrator.jpg" class="img-circle elevation-2 dropdown-toggle" alt="User Image" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" style="height: 35px; width: 35px;">

                        <ul class="dropdown-menu">
                            <li>
                                <button disabled class="button-profil" style="cursor: context-menu;">
                                    <h6 class="dropdown-item">{{ auth()->user()->name }}</h6>
                                </button>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logout" style="cursor: pointer;">
                                    <span class="text-danger">Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="display-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-white-primary elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <img src="/image/logo1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light text-black">KIM-JF</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar bg-whitesmoke">
                <!-- Sidebar user (optional) -->
                {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex bg-white">
                    <div class="image">
                        <img src="/image/administrator.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <h5 class="d-block">{{ auth()->user()->name }}</h5>
                    </div>
                    <div class="logout">
                        <a onclick="event.preventDefault();document.getElementById('logout-form').submit()" href="{{ route('logout') }}" role="button">
                            <span class="btn btn-danger" style="cursor: pointer; border-radius: 30px; margin-left: 20px;">
                                <i class="fas fa-sign-out-alt"></i>
                            </span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="display-none">
                            @csrf
                        </form>
                    </div>
                </div> --}}
                <!-- SidebarSearch Form -->
                {{-- <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar text-black" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div> --}}

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="/admin/dashboard" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : null }}">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        <li class="nav-item">
                            <a href="/admin/menu" class="nav-link {{ Request::is('admin/menu') ? 'active' : null }}">
                                <i class="nav-icon fas fa-hamburger"></i>
                                <p>
                                    Menu
                                </p>
                            </a>
                            {{-- <li class="nav-item">
                                <a href="/admin/meja-makan" class="nav-link {{ Request::is('admin/meja-makan') ? 'active' : null }}">
                                    <i class="nav-icon fas fa-table"></i>
                                    <p>Meja Makan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ Request::is('admin/pesanan') ? 'active' : null }}">
                                    <i class="nav-icon fas fa-shopping-cart"></i>
                                    <p>Pesanan</p>
                                </a>
                            </li> --}}
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            {{-- <section class="content-header">
                <div class="container-fluid">
                    @yield('heading')
                </div>
            </section> --}}

            <!-- Main content -->
            <section class="content">
                @yield('text')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer" style="background: whitesmoke;">
            <div class="float-right d-none d-sm-block">
                <span class="brand-text font-weight-border">
                    <img src="/image/logo1.png" style="height: 25px; width: 25px;">KIM-JF
                </span>
            </div>
            <small>
                <strong>Copyright &copy; 2023
                    <a href="">AdminKIM-JF</a>.
                </strong> All rights reserved.
            </small>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('/admin-template/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/admin-template/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    {{-- <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        $('#alert').removeClass('d-none');

        setTimeout(() => {
            $('.alert').alert('close');
        }, 4000);

        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    @stack('javascript')
</body>

</html>
