@extends('layout.layout')

@section('content')

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
                                        <form action="{{ route('category.destroy', $editdata->id) }}" method="post">
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
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-rHyoN1iRsVXV4nDqO9Qaiw8hKd6vbXU7YU9qWOqI01iyJDlYQ5vgEFudI5I6k7lJ" crossorigin="anonymous">
</script> --}}
@endsection
