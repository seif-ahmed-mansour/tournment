<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>
<body class="bg-gray-900 text-white">
    <style>
        ::-webkit-scrollbar{
            display: none
        }
        input[type="text"], input[type="radio"] {
            caret-color: white !important;
            color: white /* Blue color for the cursor */
        }

    </style>

    <div class="container mx-auto mt-10">
        <center>
            <h1 class="text-4xl font-bold mb-8">Edit Event</h1>
        </center>
        <div class="bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4 text-white">
            <form action="{{ route('updateEvent', ['id' => $event->id]) }}" method="post" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="name" id="event_name"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        value="{{ old('name', $event->name) }}" required />
                    <label for="event_name"
                        class="absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-0 peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Event
                        Name</label>
                </div>

                <div class="mt-4">
                    <label for="type" class="text-sm text-white">Event Type:</label>
                    <div class="flex items-center mt-2">
                        <input type="radio" name="type" value="team" id="type_team"
                            class="form-radio h-4 w-4 text-blue-600 transition duration-150 ease-in-out"
                            {{ old('type', $event->type) == 'team' ? 'checked' : '' }}>
                        <label for="type_team" class="ml-2 text-white">Team</label>
                        <input type="radio" name="type" value="individual" id="type_individual"
                            class="form-radio h-4 w-4 text-blue-600 transition duration-150 ease-in-out ml-4"
                            {{ old('type', $event->type) == 'individual' ? 'checked' : '' }}>
                        <label for="type_individual" class="ml-2 text-white">Individual</label>
                    </div>
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="category" id="event_category"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        value="{{ old('category', $event->category) }}" required />
                    <label for="event_category"
                        class="absolute text-sm text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-0 peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Event
                        Category</label>
                </div>

                @foreach ($event->questions as $index => $question)
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="questions[{{ $question->id }}]" id="question_{{ $index + 1 }}"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            value="{{ old('questions.'.$question->id, $question->question) }}" required />
                        <label for="question_{{ $index + 1 }}"
                            class="absolute text-sm text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-0 peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Question
                            {{ $index + 1 }}</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="answers[{{ $question->id }}]" id="answer_{{ $index + 1 }}"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            value="{{ old('answers.'.$question->id, $question->answer) }}" required />
                        <label for="answer_{{ $index + 1 }}"
                            class="absolute text-sm text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-0 peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Answer
                            {{ $index + 1 }}</label>
                    </div>
                @endforeach

                <div class="flex justify-center">
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update
                        Event</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>