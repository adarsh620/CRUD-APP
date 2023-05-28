@extends('layouts.app')

@section('content')

<head>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <style>
    .card {
        border-radius: 20px;
        box-shadow: 0px 0px 10px #ccc;
    }

    .card-header {
        background-color: #6c63ff;
        color: #fff;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
    }

    .btn-success {
        background-color: #6c63ff;
        border-color: #6c63ff;
    }

    .btn-success:hover {
        background-color: #4f47c2;
        border-color: #4f47c2;
    }

    .btn-primary {
        background-color: #ff6b6b;
        border-color: #ff6b6b;
    }

    .btn-primary:hover {
        background-color: #d90429;
        border-color: #d90429;
    }

    label {
        font-weight: bold;
    }
    </style>
</head>
<div class="container-fluid"
    style="background-image: url('https://source.unsplash.com/random'); background-size: cover; background-position: center center;">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title mb-0">
                        <i class="fas fa-chart-line"></i> Dashboard
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('data.export') }}" class="btn btn-success btn-block">
                                <i class="fas fa-file-export"></i> Export Data
                            </a>
                        </div>
                        <div class="col-md-6">
                            <form action="{{ route('data.import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file" name="file">
                                            <label class="custom-file-label" for="csv_file">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">
                                    <i class="fas fa-file-import"></i> Import Data
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection