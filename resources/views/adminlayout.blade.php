<!DOCTYPE html>
<html  class="w-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>KaamDhandha</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/scrollreveal">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" href="css/mycss.css">
</head>
<body class="lay">
    <div id="app ">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark   lay" >
            <div class="container">
                <a class="navbar-brand" href="/admin">
                <span class="text-success"><i class="fa fa-skiing text-white"></i> Kaam</span><span class="text-primary">Dhandha</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    @if ($message = Session::get('admin'))
                        <li class="nav-item">
                            <a class="nav-link" href="/adminunauth">Logout</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/">Site</a>
                        </li>
                    @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                  
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>
    <div class="footer p-5" id="about">
        <div class="row m-0 p-0">
            <div class="col-md-3">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <span class="text-success"><i class="fa fa-skiing text-dark"></i> Kaam</span><span class="text-primary">Dhandha</span>
                </a>
            </div>
            <div class="col-md-2">
                <h1 class="lead text-secondary">Address</h1>
                <p>Guwahati, Assam India.</p>
                <p>
                    <a href="https://www.google.com/maps/dir//26.1854991,91.7922069/@26.1856098,91.792561,17z">
                        Find us on maps <i class="fa fa-search-location"></i>
                    </a>
                </p>
            </div>
            <div class="col-md-2 ">
                <h1 class="lead text-secondary">Contact</h1>
                <p>
                    <a href="mail:badalmishr7035@gmail.com" class="text-danger">
                        Click to send mails <i class="fa fa-envelope"></i>
                    </a>
                   
                </p>
                <p>
                    <a href="https://badalmishra.github.io" class="">
                        <span class="text-dark"> Badal Mishra on github<i class="fab fa-github"></i></span>
                    </a>
                </p>
            </div>
            <div class="col-md-2 ">
                <h1 class="lead text-secondary">No branches yet.</h1>
                
            </div>
        </div>
    </div>
</body>
</html>
