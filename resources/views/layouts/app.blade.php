<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    .navbar-text {
        font-size: 18px;
        font-weight: bold;
        color: #ffffff;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 4px 8px;
        background: linear-gradient(to right, #00b4db, #0083b0);
        border-radius: 20px;
        box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('data.home') }}">
            <img src="{{ asset('images/logo.webp') }}" alt="Logo" width="30" height="30"
                class="d-inline-block align-top">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <span class="navbar-text">Welcome, {{ Auth::user()->name }}</span>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('data.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('data.create') }}">Add Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('data.index') }}">Dashboard</a>
                </li>
            </ul>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </nav>


    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-12">
                @yield('content')
            </div>
        </div>
    </div>

    <footer class="bg-dark py-3" style="margin-bottom: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-muted">
                    &copy; Nagarro {{ date('Y') }}
                </div>
                <div class="col-md-6 text-muted text-md-right">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="https://policies.google.com/privacy?hl=en-US"
                                class="text-muted">Privacy Policy</a>
                        </li>
                        <li class="list-inline-item"><a href="https://policies.google.com/terms?hl=en-US"
                                class="text-muted">Terms of Use</a></li>
                        <li class="list-inline-item"><a href="/contact-us" class="text-muted">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>