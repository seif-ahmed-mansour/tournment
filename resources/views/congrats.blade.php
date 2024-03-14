@extends('layout.layout')
@section('body')
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh">
        <div>
            <h1>great job,</h1>
            <a href="{{ route('leaderboard') }}" class="btn btn-info">view leaderboards</a>
        </div>
    </div>
@endsection
