<?php
$admin = Session::get('admin')
?>
@extends('layout.layout')
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
            <h3>welcome back {{ $admin->name }}</h3>
            <hr>
            <h5 class="text-center">all events</h5>
            <table class="table">
                <thead>
                    <th>Event Name</th>
                    <th>Event Type</th>
                    <th>Event Category</th>
                </thead>
                <tbody>
                    @foreach($events as $event)
                    <tr>
                        <td>{{ $event->name }}</td>
                        <td>{{ $event->type }}</td>
                        <td>{{ $event->category }}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            
        </div>
    @endsection
</body>

</html>
