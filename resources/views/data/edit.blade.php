@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Data</h1>
    <form action="{{ route('data.update', $data) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('data.form')
        <button type="submit" class="btn btn-primary">Update</button>
        <div></div>
    </form>
</div>
@endsection