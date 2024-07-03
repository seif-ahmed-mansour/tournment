{{-- @extends('layout.layout')

@section('body')
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">tournment Leaderboard</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr> --}}
                                    {{-- <th>Rank</th> --}}
                                    {{-- <th>User</th>
                                    <th>Total Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaderboard as $key => $user)
                                    <tr class="{{ $user->id === auth()->id() ? 'table-success' : '' }}"> --}}
                                        {{-- <td>{{ $key + 1 }}</td> --}}
                                        {{-- <td>{{ $user->name }}</td>
                                        <td>{{ $user->participants->sum('total_score') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="/" class="btn btn-primary my-3">back to home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
 --}}

    {{-- @if (auth()->check() && !auth()->user()->participants->count())
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="{{ route('participateEvents') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">Participate in events</button>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection --}}
@extends('layout.layout')

@section('body')
    <div class="container mx-auto mt-8 min-h-screen">
        <div class="bg-gray-800 text-white rounded-lg overflow-hidden shadow-lg">
            <div class="px-6 py-4">
                <h2 class="text-2xl font-semibold mb-4 text-center">Tournament Leaderboard</h2>
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="text-center">
                        <tr>
                            {{-- <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rank</th> --}}
                            <th class="px-8 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">User</th>
                            <th class="px-8 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Total Score</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @foreach ($leaderboard as $key => $user)
                            <tr class="{{ $user->id === auth()->id() ? 'bg-gray-700' : 'bg-gray-900' }} hover:bg-gray-600 text-center">
                                {{-- <td class="px-6 py-4 whitespace-nowrap">{{ $key + 1 }}</td> --}}
                                <td class="px-6 py-4 whitespace-nowrap text-white">{{ $user->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-white">{{ $user->participants->sum('total_score') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="bg-gray-900 px-6 py-4">
                <a href="/" class="block w-full text-center text-blue-500 hover:text-blue-600 font-semibold py-2 px-4 rounded-lg">
                    Back to Home
                </a>
                @if (auth()->check() && !auth()->user()->participants->count())
                    <form action="{{ route('participateEvents') }}" method="post" class="mt-4">
                        @csrf
                        <button type="submit" class="block w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">
                            Participate in Events
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
