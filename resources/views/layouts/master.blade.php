<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Online Shopping</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
  <link rel="shortcut icon" href="{{asset('images/logo.png')}}">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
</head>

<body>
    @if(Auth::user())
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <div class="row" style="width: 100%;">
                @if(Auth::user()->role == 'user')
                <a class="navbar-brand" href="/home">Online Shopping System</a>
                @elseif(Auth::user()->role == 'admin')
                <a class="navbar-brand" href="/dashboard">Online Shopping System</a>
                @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav ml-auto">
                        @if(Auth::user()->role == 'user')
                        <li class="nav-item active">
                            <a class="nav-link" href="/home">Home</a>
                        </li>
                        <li class="nav-item" data-nav="history">
                            <a class="nav-link" href="/history">history</a>
                        </li>
                        @endif
                        @if(Auth::user()->role == 'admin')
                        <li class="nav-item active">
                            <a class="nav-link" href="/dashboard">Home</a>
                        </li>
                        @endif
                        <li class="nav-item" data-nav="logout">
                            <a class="nav-link" href="/logout">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    @endif
    <div class="container">
        @yield('content')
    </div>
    @yield('scripts')
</body>
</html>
