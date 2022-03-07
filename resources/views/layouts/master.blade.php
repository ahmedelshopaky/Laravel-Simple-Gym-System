<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    {{--
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style --> --}}
    {{--
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css"> --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js">
    </script>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('contact') }}" class="nav-link">Contact Us</a>
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

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav">
                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->email }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="{{ route('home') }}" class="brand-link text-decoration-none">
                <img src="{{asset('/images/gym-logo.jpg')}}" class="brand-image-xl img-circle elevation-3 mx-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">A-Team Gym</span>
            </a>

            <div class="sidebar mt-3 p-1">
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
                        @role('admin')
                        <li class="nav-item menu-close">
                            <a href="#" class="nav-link active">
                                <i class="fa-solid fa-address-card nav-icon"></i>
                                <p>City Managers<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">


                                <li class="nav-item">
                                    <a href="{{route('city-managers.index')}}" class="nav-link">
                                        <i class="far fa-user-circle nav-icon"></i>
                                        <p>City Managers</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('city-managers.create')}}" class="nav-link">
                                        <i class="fa-solid fa-user-plus nav-icon"></i>
                                        <p>Assign City Manager</p>
                                    </a>
                                </li>


                            </ul>
                        </li>
                        @endrole
                        @hasanyrole('admin|cityManager')
                        <li class="nav-item menu-close">
                            <a href="#" class="nav-link active">
                                <i class="fa-regular fa-address-card nav-icon"></i>
                                <p>Gym Managers<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('gym-managers.index')}}" class="nav-link">
                                        <i class="fa-solid fa-circle-user nav-icon"></i>
                                        <p>Gym Managers</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('gym-managers.create')}}" class="nav-link">
                                        <i class="fa-solid fa-user-gear nav-icon"></i>
                                        <p>Assign Gym Manager</p>
                                    </a>
                                </li>


                            </ul>
                        </li>
                        @endhasanyrole

                        <li class="nav-item menu-close">
                            <a href="#" class="nav-link active">
                                <i class="fa-solid fa-user-group nav-icon"></i>
                                <p>Gym Members<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">


                                <li class="nav-item">
                                    <a href="{{route('gym-members.index')}}" class="nav-link">
                                        <i class="fa-solid fa-user-large nav-icon"></i>
                                        <p>Gym Member</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('gym-members.create')}}" class="nav-link">
                                        <i class="fa-solid fa-user-lock nav-icon"></i>
                                        <p>Assign Gym Member</p>
                                    </a>
                                </li>

                            </ul>
                        </li>








                        <li class="nav-item menu-close">
                            <a href="#" class="nav-link active">
                                <i class="fa-solid fa-dumbbell nav-icon"></i>
                                <p>Gyms<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('gyms.index')}}" class="nav-link">
                                        <i class="fa-solid fa-weight-hanging nav-icon"></i>
                                        <p>Gyms</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('gyms.create')}}" class="nav-link">
                                        <i class="fa-solid fa-medal nav-icon"></i>
                                        <p>Create Gyms</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item menu-close">
                            <a href="#" class="nav-link active">
                                <i class="fa-solid fa-hand-back-fist nav-icon"></i>
                                <p>Coaches<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('coaches.index')}}" class="nav-link">
                                        <i class="fa-solid fa-hand nav-icon"></i>

                                        <p>Coaches</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('coaches.create')}}" class="nav-link">
                                        <i class="fa-solid fa-hand-holding-dollar nav-icon"></i>
                                        <p>Hiring Coaches</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item menu-close">
                            <a href="#" class="nav-link active">
                                <i class=" fa-solid fa-wallet nav-icon"></i>
                                <p>Training Packages<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('training-packages.index')}}" class="nav-link">
                                        <i class="fa-solid fa-file-invoice nav-icon"></i>
                                        <p>Training Packages</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('training-packages.create')}}" class="nav-link">
                                        <i class="fa-solid fa-file-invoice-dollar nav-icon"></i>
                                        <p>Create Training Package</p>
                                    </a>
                                </li>
                            </ul>
                        </li>



                        <li class="nav-item menu-close">
                            <a href="#" class="nav-link active">
                                <i class="fa-solid fa-person-running nav-icon"></i>
                                <p>Training Sessions<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{route('training-sessions.index')}}" class="nav-link">
                                        <i class="fa-solid fa-bell nav-icon"></i>
                                        <p>Training Sessions</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('training-sessions.create')}}" class="nav-link">
                                        <i class="fa-brands fa-battle-net nav-icon"></i>
                                        <p>Create Training Session</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('cities.index')}}" class="nav-link">
                                <i class="fa-solid fa-archway nav-icon"></i>
                                <p>Cities</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('attendance.index')}}" class="nav-link">
                                <i class="fa-solid fa-clock nav-icon"></i>
                                <p>Attendance</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('buy-package.create')}}" class="nav-link">
                                <i class="far fa-credit-card nav-icon"></i>
                                <p>Buy Packages For Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('revenue.index')}}" class="nav-link">
                                <i class="far fa-usd nav-icon"></i>
                                <p>Revenue</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            @yield('content')
        </div>

        <aside class="control-sidebar control-sidebar-dark">
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>


        <!-- <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
        </footer> -->
    </div>

    <script src="{{asset('js/app.js')}} "> </script>

</body>

</html>