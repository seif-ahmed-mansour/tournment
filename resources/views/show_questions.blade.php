@extends('layout.layout')
@section('title', 'Questions')

@section('body')
<style>
    ::-webkit-scrollbar{
        display: none
    }
    input[type="text"], input[type="radio"] {
        caret-color: white !important;
        color: white /* Blue color for the cursor */
    }

</style>

    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-6">{{ $event->name }} Questions</h1>
        <form action="{{ route('submitAnswers', $event) }}" method="post" class="space-y-6">
            @csrf
            @foreach ($questions as $question)
                <div class="bg-gray-800 text-white rounded-lg shadow-lg overflow-hidden">
                    <div class="px-6 py-4">
                        <h2 class="text-lg font-semibold mb-3">{{ $question->question }}</h2>
                        <input type="hidden" name="user_answers[{{ $question->id }}]" value="{{ $question->answer }}">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="user_answers[{{ $question->id }}]" id="answer_{{ $question->id }}"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder="" required />
                            <label for="answer_{{ $question->id }}"
                                class="absolute text-md duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-0 peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Your Answer</label>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="flex justify-between mt-6">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                    Submit Answers
                </button>
                <a href="/" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600">
                    Continue Later
                </a>
            </div>
        </form>
    </div>
@endsection
