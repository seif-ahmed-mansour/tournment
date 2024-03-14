@extends('layout.layout')
@section('body')
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="text-center">
            <h1>great job you completed your events,</h1>
            <a href="{{ route('leaderboard') }}" class="btn btn-info ">view leaderboards</a>
        </div>
    </div>
@endsection
