{{-- <!DOCTYPE html>
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

</html> --}}
<script src="https://cdn.tailwindcss.com"></script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@yield('title')</title>
</head>


<body>
    <style>
        ::-webkit-scrollbar {
            display: none
        }
    </style>

    <nav class="bg-gray-800 p-4 sticky top-0 z-50">
        <div class="flex items-center justify-between">
            <div class="text-white text-xl font-bold">
                <a href="#" class="text-white">Tournament</a>
            </div>
            <button type="button" class="text-white md:hidden" id="nav-toggle">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <div class="hidden md:flex items-center space-x-6">
                <a href="/" class="text-white hover:text-blue-600">Home</a>
                <a href="#" class="text-white hover:text-blue-600">About Us</a>
                <a href="#" class="text-white hover:text-blue-600">Events</a>
            </div>
            <ul class="hidden md:flex items-center space-x-4" id="nav">
                @guest <!-- Check if the user is a guest (not logged in) -->
                    <li>
                        <a href="{{ route('login') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Login</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Register</a>
                    </li>
                @else
                    <!-- User is logged in -->
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</button>
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
        <ul class="md:hidden hidden mt-2 space-y-2" id="nav-mobile">
            <li>
                <a href="#" class="block text-white bg-gray-700 p-2 rounded">Home</a>
            </li>
            <li>
                <a href="#" class="block text-white bg-gray-700 p-2 rounded">About Us</a>
            </li>
            <li>
                <a href="#" class="block text-white bg-gray-700 p-2 rounded">Events</a>
            </li>
            @guest
                <li>
                    <a href="{{ route('login') }}" class="block text-white bg-blue-500 p-2 rounded hover:bg-blue-600">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="block text-white bg-blue-500 p-2 rounded hover:bg-blue-600">Register</a>
                </li>
            @else
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="block w-full text-white bg-red-500 p-2 rounded hover:bg-red-600">Logout</button>
                    </form>
                </li>
            @endguest
        </ul>
    </nav>
    <div class="container mx-auto px-4">
        @yield('body')
    </div>

    <script>
        // Toggle nav menu on mobile
        document.getElementById('nav-toggle').addEventListener('click', function () {
            var navMobile = document.getElementById('nav-mobile');
            navMobile.classList.toggle('hidden');
        });
    </script>
</body>


</html>
