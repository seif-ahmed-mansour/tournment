@extends('layout.layout')
@section('body')
    <div class="flex justify-center items-center h-screen">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-4">Great job! You completed your events.</h1>
            <a href="{{ route('leaderboard') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded inline-block mt-2">View
                Leaderboards</a>
        </div>
    </div>
@endsection
