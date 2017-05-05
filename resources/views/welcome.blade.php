<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bundespolizei - Bewerberportal - @yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico?v=2') }}">
</head>
<body>


<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Register</a>
        </div>
    @endif
</div>

    <div class="content">
        <p>&nbsp;</p>
            <ul class="progress-indicator ">
                <li class="completed">
                    <span class="bubble"></span>
                    Stelle auswählen <br><small>(erledigt)</small>
                </li>
                <li class="completed">
                    <span class="bubble"></span>
                    Persönliche Daten <br><small>(erledigt)</small>
                </li>
                <li class="active">
                    <span class="bubble"></span>
                    Motivation <br><small>(in Bearbeitung)</small>
                </li>
                <li>
                    <span class="bubble"></span>
                    Bewerbung Abschicken
                </li>
            </ul>
        </div>
    </div>
</body>
</html>
