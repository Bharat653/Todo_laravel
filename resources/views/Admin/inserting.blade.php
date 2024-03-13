@extends('layout.layout')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form | CodingLab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #3498db;
            color: #ffffff;
        }

        .navbar-brand,
        .navbar-nav .nav-link {
            color: #ffffff;
        }

        .navbar-toggler-icon {
            background-color: #ffffff;
        }

        .container {
            margin-top: 20px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #3498db;
            color: #ffffff;
            border-radius: 10px 10px 0 0;
        }

        .table {
            background-color: #ffffff;
        }

        th,
        td {
            border: none;
        }

        .table thead th {
            background-color: #3498db;
            color: #ffffff;
        }

        .table tbody tr:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.index') }}">Dashboard</a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link" href="{{route('logout')}}"><strong>Log Out</strong></a>
                </li>
            </ul>

        </div>
    </nav>


    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                         List
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="text-white bg-secondary">
                                <th>No.</th>
                                <th>Category Name</th>
                                <th>Register By</th>
                        
                            </thead>
                            <tbody id="list">
                                {{-- @dd($getalluser) --}}
                                @foreach ($getalluser as $editdata)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $editdata->category_name }}</td>
                                        <td>{{ $editdata->register->name}}</td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-rHyoN1iRsVXV4nDqO9Qaiw8hKd6vbXU7YU9qWOqI01iyJDlYQ5vgEFudI5I6k7lJ" crossorigin="anonymous">
    </script>

</body>

</html>
@endsection