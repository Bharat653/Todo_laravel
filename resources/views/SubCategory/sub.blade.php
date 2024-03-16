@extends('layout.master')

@section('content')
{{-- @dd($getalldata); --}}
    @php
    // @dd( $subCategoryData);
        $subCategoryData = null;
        if (isset($subCategory)) {
            $subCategoryData = $subCategory;
        }

    @endphp

    @if (auth()->user()->role == 0)
        <x-edit :subCategory="$subCategoryData" />
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-secondary text-white">
                            Sub List
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="text-white bg-secondary">
                                    <th>No.</th>
                                    <th>Sub Name</th>
                                    <th>Category Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </thead>
                                <tbody id="list">
                                    @foreach ($getalldata as $editdata)
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $editdata->sub_name }}</td>
                                        <td>{{ $editdata->category->category_name }}</td>
                                        <td> <a href="{{ route('sub.edit', $editdata->id) }}" class="btn btn-dark">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('sub.destroy', $editdata->id) }}" method="post">
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
                            Sub List
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="text-white bg-secondary">
                                    <th>No.</th>
                                    <th>Sub Name</th>
                                    <th>Category Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </thead>
                                <tbody id="list">
                                    @foreach ($getalldata as $editdata)
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $editdata->sub_name }}</td>
                                        <td>{{ $editdata->category->category_name }}</td>
                                        <td> <a href="{{ route('sub.edit', $editdata->id) }}" class="btn btn-dark">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('sub.destroy', $editdata->id) }}" method="post">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-rHyoN1iRsVXV4nDqO9Qaiw8hKd6vbXU7YU9qWOqI01iyJDlYQ5vgEFudI5I6k7lJ" crossorigin="anonymous">
    </script>

@endsection
