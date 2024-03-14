@extends('layout.layout')

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Leaderboard</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Rank</th>
                                    <th>User</th>
                                    <th>Total Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaderboard as $key => $user)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->participants->sum('total_score') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (auth()->check() && !auth()->user()->participants->count())
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
@endsection
