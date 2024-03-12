<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>@yield('title')</title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">

        <div class="logo_inframe">
            <a href="#" class="navbar-brand text-light m-2">tournament</a>
        </div>
        <button type="button" class="btn navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="collapse navbar-nav navbar-collapse justify-content-end" id="nav">
            @guest <!-- Check if the user is a guest (not logged in) -->
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link text-light">Login</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link text-light">Register</a>
                </li>
            @else
                <!-- User is logged in -->
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link text-light">Logout</button>
                    </form>
                </li>
            @endguest
        </ul>
    </nav>
    @yield('body')



    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
