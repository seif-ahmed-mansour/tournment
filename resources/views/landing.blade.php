@extends('layout.layout')
@section('title')
    landing
@endsection
@section('body')
    {{-- @guest
        <p>hello guest</p>
    @else
        <p>hello user</p>
    @endguest --}}
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 90vh">
            <div class="col-md-6">
                <!-- Text on the left side -->
                <h1>Welcome to <span class="text-info">collage tournment</span></h1>
                <p>Welcome to the cutting-edge scoring system tailored for college tournaments. Our platform offers seamless
                    management of individual and team events, guaranteeing precise and equitable scoring across diverse
                    competitions. Join us and redefine how tournaments are scored.</p>
                @guest
                    <a href="{{ route('register') }}" class="btn btn-primary">Get started</a>
                @else
                    @if (auth()->check())
                        <form action="{{ route('participateEvents') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary">Participate in events</button>
                        </form>
                    @endif
                @endguest
            </div>
            <div class="col-md-6">
                <!-- Image on the right side -->
                <div class="text-center">
                    <img src="https://img.freepik.com/premium-vector/businessman-holding-winning-trophy-victory-concept_115990-419.jpg?w=900"
                        alt="Image" class="img-fluid" style="mix-blend-mode:hard-light">
                </div>
            </div>
        </div>
    </div>
@endsection
