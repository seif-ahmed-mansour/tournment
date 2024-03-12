@extends('layout.layout')
@section('title')
    landing
@endsection
@section('body')
    @guest
        <p>hello guest</p>
    @else
        <p>hello user</p>
    @endguest
@endsection
