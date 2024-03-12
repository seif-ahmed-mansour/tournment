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
        </div>
    @endsection
</body>

</html>
