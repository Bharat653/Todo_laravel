@extends('layout.layout')

@section('content')

<div class="container">
    <div class="wrapper">
        <h1>Add todo</h1>
        <form action="{{ route('dashboard2.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="register_id" value="{{ auth()->user()->id }}" class="form-control" hidden>
            <div class="row">
                <input type="text" style="background-color :black; color :white" name="list"
                    class="form-control input-sm" placeholder=" list">
            </div>

            <div class="button">
                <input type="submit" value="Submit" name="submit" class="btn btn-primary btn-sm">
            </div>
        </form>
    </div>
</div>

<div class="m-2">
    <table class="table mt-3">
        <thead>
            <th>No.</th>
            <th>Todo List</th>
            <th>Owner</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        @foreach ($todoData as $editdata)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $editdata->list }}</td>
                <td>{{ $editdata->register_id }}</td>
                <td> <a href="{{ route('dashboard2.edit', $editdata->id) }}" class="btn btn-dark">Edit</a>
                </td>

                <td>
                    <form action="{{ route('dashboard2.destroy', $editdata->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </td>
            </tr>
        @endforeach
        <tbody id="list"></tbody>
    </table>
</div>

@endsection
