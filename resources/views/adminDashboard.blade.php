<?php
$admin = Session::get('admin');
?>
{{-- @extends('layout.layout')
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
    @section('body')
        <div class="container mt-4">
            @if ($admin)
                <h3 class="text-4xl">welcome back <span class="text-info">{{ $admin->name }}</span></h3>
            @else
                <h3>welcome to the first time our new <span class="text-info">Admin</span></h3>
            @endif
            <hr>
            <h5 class="text-center">all events</h5>
            <table class="table">
                <thead>
                    <th>Event Name</th>
                    <th>Event Type</th>
                    <th>Event Category</th>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td>{{ $event->name }}</td>
                            <td>{{ $event->type }}</td>
                            <td>{{ $event->category }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="container">
            <a href="{{ route('addEvent') }}" class="btn btn-primary">Add event</a>
        </div>
    @endsection
</body>

</html> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/tailwind.min.css') }}" rel="stylesheet">
    <title>Admin Dashboard</title>
</head>

<body class="bg-gray-900 text-white">
    @extends('layout.layout')

    @section('body')
        <div class="container mx-auto mt-4">
            @if ($admin)
                <h3 class="text-4xl">Welcome back <span class="text-blue-500">{{ $admin->name }}</span></h3>
            @else
                <h3>Welcome to the first time as our new <span class="text-blue-500">Admin</span></h3>
            @endif
            <hr class="my-4">

            <h5 class="text-center text-3xl font-semibold mb-6">All Events</h5>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-gray-800 rounded-lg shadow-lg">
                    <thead>
                        <tr class="bg-gray-700">
                            <th class="py-2 px-4">Event Name</th>
                            <th class="py-2 px-4">Event Type</th>
                            <th class="py-2 px-4">Event Category</th>
                            <th class="py-2 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr class="border-b bg-gray-800 border-gray-700 hover:bg-gray-50 hover:bg-gray-600">
                                <td class="py-2 px-4 text-center">{{ $event->name }}</td>
                                <td class="py-2 px-4 text-center">{{ $event->type }}</td>
                                <td class="py-2 px-4 text-center">{{ $event->category }}</td>
                                <td class="py-2 px-4 text-center">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('editEvent', ['id' => $event->id]) }}"
                                            class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded">Edit</a>
                                        <form action="{{ route('deleteEvent', ['id' => $event->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="container mx-auto my-4">
            <a href="{{ route('addEvent') }}"
                class="inline-block bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Add Event</a>
        </div>
    @endsection

</body>

</html>
