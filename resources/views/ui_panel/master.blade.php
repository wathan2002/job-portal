<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-info">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNavAltMarkup">
                @if (Auth::check())
                    <a href="{{ url('employee-profile')}}"><b>{{Auth::user()->name}}</b></a>
                    <div>
                        <form action="{{ route('logout') }}" method="post"> @csrf
                            <button class="btn btn-sm btn-danger m-3 float-end" onclick="return confirm('Are you sure to logout?')"> <i class="bi bi-box-arrow-right"></i> </button>
                        </form>
                    </div>
                @else
                    <div class="navbar-nav">
                        <a class="nav-link" href="{{url('login')}}">Sign In</a>
                        <a class="nav-link" href="{{url('register')}}">Sign Up</a>
                    </div>
                @endif
            </div>
        </div>
    </nav>


    @yield('content')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
