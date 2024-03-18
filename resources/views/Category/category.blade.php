@extends('layout.master')

@section('content')

    @if (auth()->user()->role == 0)
    
        <div class="container">
            <div class="wrapper">
                <div class="title"><span>Add Category</span></div>
                <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="text" name="register_id" value="{{ auth()->user()->id }}" class="form-control" hidden>
                    {{-- <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="row">
                                <i class="fas fa-book"></i>
                                <input type="text" name="category_name" placeholder="category_name" required />
                            </div>
                        </div>
                    </div> --}}
                    <div class="container">
                    <x-forms type="text" name="category_name" placeholder="category_name" />
                    {{-- <x-forms/>
                    <x-forms/> --}}
                    </div>
                        <div class="row button">
                            <input type="submit" value="submit" name="submit " />
                        </div>
                </form>
            </div>
        </div>

        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-secondary text-white">
                            Category List
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="text-white bg-secondary">
                                    <th>No.</th>
                                    <th>Category Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </thead>
                                <tbody id="list">
                                    @foreach ($getalldata as $editdata)
                                        {{-- @dd($editdata) --}}
                                        {{-- @dd($editdata->category->category_name); --}}
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $editdata->category_name }}</td>
                                            <td> <a href="{{ route('category.edit', $editdata->id) }}"
                                                    class="btn btn-dark">Edit</a> </td>
                                            <td>
                                                <form action="{{ route('category.destroy', $editdata->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="Delete" class="btn btn-danger">
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-secondary text-white">
                            Category List
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="text-white bg-secondary">
                                    <th>No.</th>
                                    <th>Category Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </thead>
                                <tbody id="list">
                                    @foreach ($getalldata as $editdata)
                                        {{-- @dd($editdata) --}}
                                        {{-- @dd($editdata->category->category_name); --}}
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $editdata->category_name }}</td>
                                            <td> <a href="{{ route('category.edit', $editdata->id) }}"
                                                    class="btn btn-dark">Edit</a> </td>
                                            <td>
                                                <form action="{{ route('category.destroy', $editdata->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="Delete" class="btn btn-danger">
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-rHyoN1iRsVXV4nDqO9Qaiw8hKd6vbXU7YU9qWOqI01iyJDlYQ5vgEFudI5I6k7lJ" crossorigin="anonymous">
    </script> --}}
@endsection
