@extends('layouts.app')

@section('content')

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

</head>
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="container-fluid">
    <h1>List of Users</h1>
    <div class="table-wrapper">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Profile Picture And Name</th>
                    <th>Personal Details</th>
                    <th>Address</th>
                    <th>Comment</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                <tr>
                    <td><img src="{{ asset('storage/'.str_replace('public/', '', $d->image)) }}" height="100"
                            width="100" class="rounded-circle"><br>{{ $d->first_name }} {{ $d->last_name }}</td>
                    <td>
                        <ul>
                            <li>
                                <b>DOB:</b> {{ $d->dob }}
                            </li>
                            <li>
                                <b>Gender:</b> {{ $d->gender }}
                            </li>
                            <li>
                                <b>Email Id:</b> {{ $d->email }}
                            </li>
                            <li>
                                <b>Phone:</b> {{ $d->phone }}
                            </li>
                        </ul>

                    </td>

                    <td>

                        <ul>
                            <li>
                                <b>Street:</b> {{ $d->street }}
                            </li>
                            <li>
                                <b>Location:</b> {{ $d->location }}
                            </li>
                            <li>
                                <b>City:</b> {{ $d->city }}
                            </li>
                            <li>
                                <b>State:</b> {{ $d->state }}
                            </li>
                            <li>
                                <b>Country:</b> {{ $d->country }}
                            </li>
                            <li>
                                <b>Zip:</b> {{ $d->zip }}
                            </li>
                        </ul>
                    </td>
                    <td>{{ $d->comment }}</td>
                    <td>

                        <a href="{{ route('data.edit', $d->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ route('data.show', $d->id) }}" class="btn btn-info">
                            <i class="fas fa-eye"></i>
                        </a>
                        <form action="{{ route('data.destroy', $d->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this data?')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <br>
        <br>
        <br>
    </div>
</div>
@endsection