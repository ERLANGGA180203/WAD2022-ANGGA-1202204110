<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TP_MODUL5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    {{-- @auth
    <style>
        .bg {
            background: #0d6efd;
        }

        .font {
            color: #FFFFFF;
        }
    </style>
    @else
    <style>
        .bg {
            background: {{ session('bgcolor') }};
        }

        .font {
            color: #FFFFFF;
        }
    </style>
    @endauth --}}
</head>

<body>
    @auth
    <nav class="navbar navbar-expand-lg" style="background: {{session('bgcolor')}}">
    @else
    <nav class="navbar navbar-expand-lg" style="background: #0d6efd">
    @endauth
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                @auth
                    <div class="navbar-nav mx-left">
                        <a class="nav-link text-light" href="/">Home</a>
                        <a class="nav-link text-light" href="/showroom">MyCar</a>
                    </div>
                    <div style="position: absolute; right:10px;bottom: 10px;">
                        <a class="btn btn-light" href="/showroom/create">Add Car</a>
                        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{Auth::user()->name}}
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/user/{{Auth::user()->name}}">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-btn').submit();">Logout</a></li>
                            <form id="logout-btn" action="/logout" method="POST">
                                {{csrf_field()}}
                            </form>
                        </ul>
                    </div>
                @else
                    <div class="navbar-nav mx-left">
                        <a class="nav-link text-light" href="Erlangga_HOME.php">Home</a>
                    </div>
                    <div class="navbar-end">
                        <a class="nav-link text-light" style="position: absolute; right:10px;bottom: 15px;"
                            href="/login">Login</a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
    
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

</html>
