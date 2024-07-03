{{-- @extends('layout.layout')
@section('title')
    landing
@endsection
@section('body') --}}
{{-- @guest
        <p>hello guest</p>
    @else
        <p>hello user</p>
    @endguest --}}
{{-- <div class="container">
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
                        @php
                            $participatedEvents = auth()->user()->participants()->count();
                        @endphp
                        @if ($participatedEvents > 0)
                            <form action="{{ route('participateEvents') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary">Complete your events</button>
                                <a href="{{ route('leaderboard') }}" class="btn btn-info text-light">View leaderboards</a>
                            </form>
                        @else
                            <form action="{{ route('participateEvents') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary">Participate in events</button>
                                <a href="{{ route('leaderboard') }}" class="btn btn-info text-light">View leaderboards</a>
                            </form>
                        @endif
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
@endsection --}}



@extends('layout.layout')
@section('title')
    landing
@endsection
@section('body')
    <div class="container mx-auto px-4">
        <section class="flex flex-col md:flex-row justify-center items-center min-h-screen">
            <div class="w-full md:w-1/2 p-4">
                <!-- Text on the left side -->
                <h1 class="text-4xl font-bold mb-4">Welcome to <span class="text-blue-500">college tournament</span></h1>
                <p class="mb-6">Welcome to the cutting-edge scoring system tailored for college tournaments. Our platform
                    offers seamless
                    management of individual and team events, guaranteeing precise and equitable scoring across diverse
                    competitions. Join us and redefine how tournaments are scored.</p>
                @guest
                    <a href="{{ route('register') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Get
                        started</a>
                @else
                    @if (auth()->check())
                        @php
                            $participatedEvents = auth()->user()->participants()->count();
                        @endphp
                        @if ($participatedEvents > 0)
                            <form action="{{ route('participateEvents') }}" method="post" class="inline">
                                @csrf
                                <button type="submit"
                                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Complete your
                                    events</button>
                            </form>
                            <a href="{{ route('leaderboard') }}"
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 ml-2">View leaderboards</a>
                        @else
                            <form action="{{ route('participateEvents') }}" method="post" class="inline">
                                @csrf
                                <button type="submit"
                                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Participate in
                                    events</button>
                            </form>
                            <a href="{{ route('leaderboard') }}"
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 ml-2">View leaderboards</a>
                        @endif
                    @endif
                @endguest
            </div>
            <div class="w-full md:w-1/2 p-4 text-center hidden md:block">
                <!-- Image on the right side -->
                <img src="https://img.freepik.com/premium-vector/businessman-holding-winning-trophy-victory-concept_115990-419.jpg?w=900"
                    alt="Image" class="mx-auto rounded shadow-lg" style="mix-blend-mode: hard-light;">
            </div>
        </section>
        {{-- ///////////////// --}}

    </div>
@endsection
