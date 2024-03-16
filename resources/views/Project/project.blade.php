@extends('layout.master')

@section('content')
    {{-- @dd($getcategory); --}}
    @if(auth()->user()->role == 0)
        
   
    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Add Project</span></div>
            <form action="{{ route('project.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <i class="fas fa-book"></i>
                    <select name="category_id" id="category" class="form-control input-sm" required>
                        <option>Select Catgeory</option>
                        @foreach ($getcategory as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <i class="fas fa-book"></i>
                    <select name="sub_id" id="sub" class="form-control input-sm" required disabled>
                        <option selected>Select Sub-Category</option>
                        @foreach ($getsubcategory as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="row">
                            <i class="fas fa-book"></i>
                            <input type="text" name="project_name" class="form" placeholder="Project Name" required>
                        </div>
                    </div>
                </div>
                <div class="row button">
                    <input type="submit" value="submit" name="submit">
                </div>
            </form>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        Project List
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="text-white bg-secondary">
                                <th>No.</th>
                                <th>Project Name</th>
                                {{-- <th>Category Name</th> --}}
                                <th>Sub Name</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </thead>
                            <tbody id="list">
                                @foreach ($getalldata as $editdata)
                                    {{-- @dd($editdata) --}}
                                    {{-- @dd($editdata->category->category_name); --}}
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $editdata->project_name }}</td>
                                        {{-- <td>{{ $editdata->category->category_name }}</td> --}}
                                        <td>{{ $editdata->sub->sub_name }}</td>
                                        <td> <a href="{{ route('project.edit', $editdata->id) }}"
                                                class="btn btn-dark">Edit</a> </td>
                                        <td>
                                            <form action="{{ route('project.destroy', $editdata->id) }}" method="post">
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
                        Project List
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="text-white bg-secondary">
                                <th>No.</th>
                                <th>Project Name</th>
                                {{-- <th>Category Name</th> --}}
                                <th>Sub Name</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </thead>
                            <tbody id="list">
                                @foreach ($getalldata as $editdata)
                                    {{-- @dd($editdata) --}}
                                    {{-- @dd($editdata->category->category_name); --}}
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $editdata->project_name }}</td>
                                        {{-- <td>{{ $editdata->category->category_name }}</td> --}}
                                        <td>{{ $editdata->sub->sub_name }}</td>
                                        <td> <a href="{{ route('project.edit', $editdata->id) }}"
                                                class="btn btn-dark">Edit</a> </td>
                                        <td>
                                            <form action="{{ route('project.destroy', $editdata->id) }}" method="post">
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

    <script>
        $(document).ready(function() {
            $('#category').change(function() {
                // alert ('heyy')
                var id = $(this).val();
                var token = "{{ csrf_token() }}";
                $.ajax({
                    type: "post",
                    url: "{{ route('getsubBycategory') }}",
                    data: {
                        id: id,
                        _token: token
                    },
                    success: function(data) {
                        var subdata = $('#sub');
                        subdata.empty();

                        subdata.append('<option selected>Select Sub-Category</option>');

                        $.each(data.subCategories, function(id, name) {
                            subdata.append('<option value="' + id + '">' +
                                name + '</option>');
                        });
                        subdata.prop('disabled', false);
                    },
                });
            });
        });
    </script>
@endsection
