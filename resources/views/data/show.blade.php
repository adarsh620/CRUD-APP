@extends('layouts.app')

@section('content')

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
    body {
        background: #eee;

    }

    .container {
        /* max-width: 1200px; */
        margin: 0;
        padding: 0;
        width: 100%;
        max-width: none;
    }

    .card {
        border: none;
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        cursor: pointer;
    }

    .card:before {

        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 4px;
        height: 100%;
        background-color: #E1BEE7;
        transform: scaleY(1);
        transition: all 0.5s;
        transform-origin: bottom
    }

    .card:after {

        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 4px;
        height: 100%;
        background-color: #8E24AA;
        transform: scaleY(0);
        transition: all 0.5s;
        transform-origin: bottom
    }

    .card:hover::after {
        transform: scaleY(1);
    }


    .fonts {
        font-size: 11px;
    }

    .social-list {
        display: flex;
        list-style: none;
        justify-content: center;
        padding: 0;
    }

    .social-list li {
        padding: 10px;
        color: #8E24AA;
        font-size: 19px;
    }


    .buttons button:nth-child(1) {
        border: 1px solid #8E24AA !important;
        color: #8E24AA;
        height: 40px;
    }

    .buttons button:nth-child(1):hover {
        border: 1px solid #8E24AA !important;
        color: #fff;
        height: 40px;
        background-color: #8E24AA;
    }

    .buttons button:nth-child(2) {
        border: 1px solid #8E24AA !important;
        background-color: #8E24AA;
        color: #fff;
        height: 40px;
    }
    </style>
</head>
<div>
    <a href="{{ route('data.home') }}" class="btn btn-success">Back to List</a>
</div>
<div class="container mt-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="row">
            <div class="card p-3 py-4">

                <div class="text-center">
                    <img src="{{ asset('storage/'.str_replace('public/', '', $data->image)) }}" width="100" height="100"
                        class="rounded-circle">
                </div>

                <div class="text-center mt-3">
                    <span class="bg-secondary p-1 px-4 rounded text-white">Pro</span>
                    <h5 class="mt-2 mb-0">{{ $data->first_name }} {{ $data->last_name }}</h5>
                    <h6 class="mt-2 mb-0">{{ $data->email }} {{ $data->phone }}</h6>
                    <h6 class="mt-2 mb-0">{{ $data->dob }} {{ $data->gender }}</h6>
                    <h6>{{ $data->street }} {{ $data->location }} {{ $data->lat }} {{ $data->lang }} {{ $data->city }}
                        {{ $data->state }}
                        {{ $data->country }} {{ $data->zip }}</h6>
                    <div class="px-4 mt-1">
                        <p class="fonts">{{ $data->comment }}</p>
                    </div>

                    <ul class="social-list">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-google"></i></a></li>
                    </ul>

                    <div class="buttons">

                        <button class="btn btn-outline-primary px-4">Message</button>
                        <button class="btn btn-primary px-4 ms-3">Contact</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <br>
</div>

@endsection