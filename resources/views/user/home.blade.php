@extends('layouts.services')

<style>
    .menu  {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #05548d;
    }

    .menu li {
        float: left;
    }

    .menu li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    .menu li a:hover:not(.active) {
        background-color: #111;
    }

    .menu li a.active {
        float: right;
    }

    .active {
        background-color: #4CAF50;
    }
</style>

@section('content')
    {{$result}}
    
@endsection
