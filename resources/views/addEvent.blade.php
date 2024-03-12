<!DOCTYPE html>
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

</html>
