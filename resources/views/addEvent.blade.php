{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Document</title>
</head>

<body>
    <div class="container mt-5">
        @csrf
        <center>
            <h1>Add Event</h1>
        </center>
        <form action="{{ route('storeEvent') }}" method="post">
            @csrf
            <label for="name">Event Name:</label>
            <input type="text" name="name" class="form-control mb-2">

            <label for="type" class="mt-3">Event Type:</label>
            <div>
                <input type="radio" name="type" value="team" class="form-check-input">
                <span>Team</span>
                <input type="radio" name="type" value="individual" class="form-check-input">
                <span>Individual</span>
            </div>

            <label for="category" class="mt-3">Event Category:</label>
            <input type="text" name="category" class="form-control mb-2">

            <label for="questions" class="mt-3">Question 1</label>
            <input type="text" name="questions[]" class="form-control mb-2">
            <label for="" class="mt-1">answer</label>
            <input type="text" name="answers[]" class="form-control mb-2">
            <label for="questions" class="mt-3">Question 2</label>

            <input type="text" name="questions[]" class="form-control mb-2">
            <label for="" class="mt-1">answer</label>

            <input type="text" name="answers[]" class="form-control mb-2">
            <label for="questions" class="mt-3">Question 3</label>

            <input type="text" name="questions[]" class="form-control mb-2">
            <label for="" class="mt-1">answer</label>

            <input type="text" name="answers[]" class="form-control mb-2">

            <button type="submit" class="btn btn-primary mt-3">Add Event</button>
        </form>


    </div>
</body>

</html> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Add Event</title>
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
    <div class="container mx-auto mt-10 ">
        <center>
            <h1 class="text-4xl font-bold mb-8">Add Event</h1>
        </center>
        <div class="bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4 text-white">
            <form action="{{ route('storeEvent') }}" method="post" class="space-y-6">
                @csrf

                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="name" id="event_name"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="event_name"
                        class="absolute text-sm  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-0 peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Event
                        Name</label>
                </div>

                <div class="mt-4">
                    <label for="type" class="text-sm text-white">Event Type:</label>
                    <div class="flex items-center mt-2">
                        <input type="radio" name="type" value="team" id="type_team"
                            class="form-radio h-4 w-4 text-blue-600 transition duration-150 ease-in-out">
                        <label for="type_team" class="ml-2 text-white">Team</label>
                        <input type="radio" name="type" value="individual" id="type_individual"
                            class="form-radio h-4 w-4 text-blue-600 transition duration-150 ease-in-out ml-4">
                        <label for="type_individual" class="ml-2 text-white">Individual</label>
                    </div>
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="category" id="event_category"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="event_category"
                        class="absolute text-sm text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-0 peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Event
                        Category</label>
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="questions[]" id="question_1"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="question_1"
                        class="absolute text-sm text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-0 peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Question
                        1</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="answers[]" id="answer_1"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="answer_1"
                        class="absolute text-sm text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-0 peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Answer
                        1</label>
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="questions[]" id="question_2"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="question_2"
                        class="absolute text-sm text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-0 peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Question
                        2</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="answers[]" id="answer_2"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="answer_2"
                        class="absolute text-sm text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-0 peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Answer
                        2</label>
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="questions[]" id="question_3"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="question_3"
                        class="absolute text-sm text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-0 peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Question
                        3</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="answers[]" id="answer_3"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="answer_3"
                        class="absolute text-sm text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-0 peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Answer
                        3</label>
                </div>

                <div class="flex justify-center">
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add
                        Event</button>
                </div>
            </form>
        </div>
    </div>
</body>


</html>
