@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Delete Data</h1>
    <form action="{{ route('data.destroy', $data->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this data?</p>
                        <h4>{{ $data->first_name }} {{ $data->last_name }}</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Delete</button>
        <a href="{{ route('data.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection