@extends('layouts.app')

@section('content')
<div class="container" width="100">
    <h1>Create Data</h1>
    <form action="{{ route('data.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('data.form')
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection