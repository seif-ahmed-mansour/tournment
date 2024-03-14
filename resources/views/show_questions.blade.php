@extends('layout.layout')
@section('title', 'Questions')

@section('body')
    <div class="container">
        <h1>{{ $event->name }} Questions</h1>
        <form action="{{ route('submitAnswers', $event) }}" method="post">
            @csrf
            @foreach ($questions as $question)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $question->question }}</h5>
                        <input type="hidden" name="answers[{{ $question->id }}]" value="{{ $question->answer }}">
                        <div class="form-group">
                            <label for="answer">Your Answer:</label>
                            <input type="text" class="form-control" id="answer"
                                name="user_answers[{{ $question->id }}]">
                        </div>
                    </div>
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Submit Answers</button>
            <a href="/" class="btn btn-danger">continue later</a>
        </form>
    </div>
@endsection
