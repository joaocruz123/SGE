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

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {!! Charts::assets() !!}

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
                <aside id="leftsidebar" class="sidebar">
                    <!-- Menu -->
                    <div class="menu">
                        <ul class="list">
                            <li class="header">MENU DE NAVEGAÇÃO</li>
                            <li>
                                <a href="{{ url('/') }}">
                                    <i class="material-icons">home</i>
                                    <span>Painel Principal</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/alunos') }}">
                                    <i class="material-icons">person</i>
                                    <span>Alunos</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('/turmas')}}">
                                    <i class="material-icons">class</i>
                                    <span>Turmas</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('/professors')}}">
                                    <i class="material-icons">school</i>
                                    <span>Professores</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('/matriculas')}}">
                                    <i class="material-icons">picture_in_picture</i>
                                    <span>Matriculas</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">credit_card</i>
                                    <span>Gerenciamento de Despesas</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="{{url('/categorias_despesas')}}">Categorias de Despesas</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/categorias_rendas')}}">Categorias de Rendas</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/despesas')}}">Despesas</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/rendas')}}">Rendas</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/relatorio_mensal')}}">Relatório Mensal</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- #Menu -->
                    <!-- Footer -->
                    <div class="legal">
                        <div class="copyright">
                            &copy; 2017 <a href="{{url('/')}}">SGEBD</a> - Desenvolvido por João Cruz.
                        </div>
                        <div class="version">
                            <b>Version: </b> 1.5.0
                        </div>
                    </div>
                    <!-- #Footer -->
                </aside>
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

        <script src="{{asset('/plugins/momentjs/moment.js')}}"></script>

        <script src="{{asset('/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>

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


        @include('Alerts::alerts')

    </div>

</body>
</html>
