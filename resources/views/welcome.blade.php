@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1>Welcome to my Laravel app</h1>
        <p>This app displays data in a table format.</p>
        <p><a class="btn btn-primary btn-lg" href="{{ route('data.index') }}" role="button">View data &raquo;</a></p>
    </div>
</div>
@endsection