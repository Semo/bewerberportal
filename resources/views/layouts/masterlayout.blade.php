<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{--<title> Bundespolizei Bewerberportal - @yield('title')</title>--}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="./static/favicon.ico?v=2" type="image/png">

    <!-- Scripts -->
    <script>
        window.Laravel = ""; <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div class="row">
    <div class="col-md-12">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>

<div class="row">
        <div class="col-md-2">Inhalte
            <hr>
        </div>
        <div class="col-md-8"></div>
        <div class="col-md-2"></div>

    </div>
    <div class="row">
        <div class="col-md-2"><a href="/applic">Bewerberliste</a>
            <br>
            <a href="/about">Über diese Site</a><br>
            <a href="/job">Jobliste</a><br>
            <a href="/job/1">Job 1</a><br>
            <a href="/applic">Bewerberliste</a><br>
            <a href="/applic/1">Bewerber 1</a></div>
        <div class="col-md-8">
            {{--            @include('breadcrumb')--}}
            @yield('content')
            {{--@show--}}
        </div>
        <div class="col-md-2">Spalte rechts</div>
    </div>


<footer class="footer footi">
    <p>&copy; Bundespolizei 1999-2017. Alle Rechte vorbehalten</p>
</footer>

<!-- Scripts -->
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>