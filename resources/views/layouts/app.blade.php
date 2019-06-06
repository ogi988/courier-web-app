<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}" ></script>
    <!--   Core JS Files   -->
  <script src="{{asset('/js/core/popper.min.js')}}"></script>
  <script src="{{asset('/js/core/bootstrap-material-design.min.js')}}"></script>
  <script src="{{asset('/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>

  <script src="{{asset('/js/material-dashboard.js?v=2.1.1')}}" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/material-dashboard.css') }}" rel="stylesheet">
</head>
<body>   
    
     





<div class="row">
    <div class="col-md-2">




        @if(isset(Auth::user()->name))
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
            </button>

            <div class="sidebar-wrapper">
                <div class="sidebar" data-color="azure" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
                    <div class="logo">
                        <a href="#" class="simple-text logo-normal">
                            Kurirska sluzba
                        </a>
                    </div>
                    <ul class="nav">
                        @hasrole('user')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user.shipments.index')}}">
                                <i class="material-icons">dashboard</i>
                                <p>Posiljke</p>
                            </a>
                        </li>
                        @endhasrole
                        @hasrole('admin')
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('admin.users.index')}}">
                                <i class="material-icons">person</i>
                                <p>Useri</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('admin.shipments.index')}}">
                                <i class="material-icons">dashboard</i>
                                <p>Posiljke</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('admin.vehicles.index')}}">
                                <i class="material-icons">commute</i>
                                <p>Vozila</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                          <a class="nav-link " href="{{route('admin.postavke.index')}}">
                            <i class="material-icons">settings</i>
                            <p>Postavke</p>
                          </a>
                        </li>
                        @endhasrole
                        @hasrole('worker')
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('worker.shipments.index')}}">
                                <i class="material-icons">person</i>
                                <p>Posiljke</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('worker.vehicles.index')}}">
                                <i class="material-icons">commute</i>
                                <p>Vozila</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('worker.map')}}">
                                <i class="material-icons">map</i>
                                <p>Mapa</p>
                            </a>
                        </li>
                        @endhasrole
                        <li class="nav-item active-pro">

                            <a class="nav-link" href="{{ route('logout') }}"

                               onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                                <i class="material-icons">power_settings_new</i>

                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>

                    </ul>
                    @endif
                </div>
            </div>
    </div>

    <div class = "col-md-10">
        @yield('content')

    </div>
</div>










</body>
</html>
