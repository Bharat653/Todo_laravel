@extends('layout.layout')

@section('content')

    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Add Sub-Category</span></div>
            <form action="{{ route('sub.store') }}" method="post" enctype="multipart/form-data">
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
                    <div class="col-md-6 mb-4">
                        <div class="row">
                            <i class="fas fa-book"></i>
                            <input type="text" name="sub_name" placeholder="Sub_name" required>
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
                                {{-- @dd($getalldata) --}}
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $editdata->sub_name }}</td>
                                        <td>{{ $editdata->category->category_name }}</td>
                                        <td>   <a href="{{ route('sub.edit', $editdata->id) }}" class="btn btn-dark">Edit</a>  </td>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-rHyoN1iRsVXV4nDqO9Qaiw8hKd6vbXU7YU9qWOqI01iyJDlYQ5vgEFudI5I6k7lJ" crossorigin="anonymous">
    </script>

@endsection

