<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dashboard</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    nav {
        background-color: #ffffff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 15px;
    }

    .navbar-brand {
        font-size: 1.5rem;
        font-weight: bold;
        color: #007bff;
    }

    .navbar-toggler-icon {
        background-color: #007bff;
    }

    .nav-link {
        color: #007bff;
    }

    .container {
        margin-top: 20px;
    }

    .wrapper {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #007bff;
    }

    form {
        margin-top: 20px;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .button {
        margin-top: 20px;
    }

    .btn-primary {
        background-color: #3576c0;
        color: #ffffff;
    }

    table {
        width: 100%;
        margin-top: 20px;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #dee2e6;
    }

    th {
        background-color: #272829;
        color: #ffffff;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #ffffff;
        padding: 9px 8px;
    }

    .btn-dark {
        color: #fff;
        background-color: #212529;
        border-color: #212529;
        padding: 9px 12px;
        text-decoration: none;
        font-size: 15px;
    }
</style>
</head>

<body>



    <div class="container">
        <div class="wrapper">
            <h1>Edit Todo</h1>
            <form action="{{ route('dashboard2.update',$getuserbyuser->id) }}" method="POST" >
                @csrf
                @method('PATCH')
                {{-- <input type="text" name="register_id" value="{{ auth()->user()->id }}" class="form-control" hidden> --}}
                <div class="col-md-6 mb-4">
                    <input type="text" name="list" value="{{isset($getuserbyuser) ? $getuserbyuser->list : ''}}" class="form-control" placeholder=" list">
                </div>
                <div class="button">
                    <input type="submit" value="Update" name="save" class="btn btn-primary btn-sm">
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-rHyoN1iRsVXV4nDqO9Qaiw8hKd6vbXU7YU9qWOqI01iyJDlYQ5vgEFudI5I6k7lJ" crossorigin="anonymous">
    </script>

</body>

</html>
