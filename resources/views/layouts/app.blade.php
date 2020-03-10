<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <link href="{{ asset('/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <link href="{{asset('/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <link href="{{asset('/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <link href="{{asset('/css/style.css')}}" rel="stylesheet">

    <link href="{{asset('/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

    <link href="{{asset('/css/themes/all-themes.css')}}" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert.css')}}">

     <!-- Bootstrap Material Datetime Picker Css -->
     <link rel="stylesheet" type="text/css" href="{{asset('/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}">

     <!-- Bootstrap DatePicker Css -->
     <link rel="stylesheet" type="text/css" href="{{asset('/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css')}}">
 

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @notifyCss

    {!! \ConsoleTVs\Charts\Facades\Charts::assets() !!}

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="theme-blue">
    <div id="app">
        <!-- Top Bar -->
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                    <a href="javascript:void(0);" class="bars"></a>
                    <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
                </div>

                <!-- Right Side Of Navbar -->
                <div class="collapse navbar-collapse" id="navbar-collapse">

                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <div class="collapse navbar-collapse" id="navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <strong>{{ Auth::user()->name }}</strong> <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href=""><i class="material-icons">person</i>Profile</a></li>
                                <li>
                                <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="material-icons">input</i> Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>

                </ul>
                </div>
                </ul>
                <!-- Left Sidebar -->
                    @include('layouts.menu')

                @endif
            </div>
            </div>
        </nav>
        @yield('content')


        <script src="{{asset('/js/app.js')}}"></script>

        <script src="{{asset('/plugins/jquery/jquery.min.js')}}"></script>

        <script src="{{asset('/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

        <script src="{{asset('/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

        <script src="{{asset('/plugins/node-waves/waves.js')}}"></script>

        <script src="{{asset('/plugins/jquery-countto/jquery.countTo.js')}}"></script>

        <script src="{{asset('/js/modals.js')}}"></script>

        <script src="{{asset('js/sweetalert.js')}}"></script>

        <script src="{{asset('/js/admin.js')}}"></script>

        <script src="{{asset('/js/pages/index.js')}}"></script>

        <script src="{{asset('/js/notifications.js')}}"></script>

        <script src="{{asset('/js/basic-form-elements.js')}}"></script>

        <!-- Jquery Spinner Plugin Js -->
        <script src="{{asset('/plugins/jquery-spinner/js/jquery.spinner.js')}}"></script>

        <!-- Demo Js -->
        <script src="{{asset('/js/demo.js')}}"></script>
        
        <script src="{{asset('/js/pages/widgets/infobox/infobox-4.js')}}"></script>

        <script src="{{ asset('/js/bootstrap-checkbox-radio-switch.js') }}"></script>

        @include('Alerts::alerts')

        @notifyJs

        <!-- Moment Plugin Js -->
        <script src="/plugins/momentjs/moment.js"></script>

        <!-- Bootstrap Material Datetime Picker Plugin Js -->
        <script src="/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

        <!-- Bootstrap Datepicker Plugin Js -->
        <script src="/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

        <script type="text/javascript">
            $('.datepicker').bootstrapMaterialDatePicker({
                format: 'DD-MM-YYYY',
                clearButton: true,
                weekStart: 1,
                time: false
            });
        </script>
    </div>
</body>
</html>
