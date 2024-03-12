<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> --}}
    <title>Register</title>
</head>

<body>
    <div class="login-cont">
        <form class="form" action="{{ route('register') }}" method="POST">
            @csrf
            <p class="form-title">create your account</p>
            @error('name')
                <span class="alert">{{ $errors->first('name') }}</span>
            @enderror
            <div class="input-container">
                <input placeholder="Enter Username" type="text" name="name">
            </div>
            @error('email')
                <span class="alert alert-danger">{{ $errors->first('email') }}</span>
            @enderror
            <div class="input-container">
                <input placeholder="Enter email" type="email" name="email">
                <span>
                    <svg stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <!-- SVG Icon -->
                    </svg>
                </span>
            </div>
            @error('password')
                <span class="alert alert-danger">{{ $errors->first('password') }}</span>
            @enderror
            <div class="input-container">
                <input placeholder="Enter password" type="password" name="password">
                <span>
                    <svg stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <!-- SVG Icon -->
                    </svg>
                </span>
            </div>
            <label for=""> 
                <input type="checkbox" name="type">
                join as team                
            </label>
            <button class="submit" type="submit">Sign up</button>
            <p class="signup-link">Have an account? <a href="{{ route('login') }}">Sign in</a></p>
        </form>

    </div>

</body>

</html>
