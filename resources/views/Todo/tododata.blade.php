@extends('layout.master')

@section('content')
    <div class="container">
        {{-- @dd($gettododata); --}}
        <select class="todo" name="todo[]" multiple="multiple">
            @foreach ($gettododata as $getdata)
                <option value="{{ $getdata->id }}">{{ $getdata->todo_name }}</option>
            @endforeach
        </select>

        {{-- @dd( $getdata); --}}

        <div class="row m-2">
            <form action="">
                <div class="form-group">
                    <input type="search" name="search" id="" class="form-control" placeholder="Search from name"
                        value="{{ $search }}" />
                </div>

                <button class="btn btn-primary"> Search</button>
                <a href="{{ route('tododata.index') }}">
                    <button class="btn btn-danger" type="button">Reset</button>
                </a>
            </form>

        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        Todo Data
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="text-white bg-secondary">
                                <th>No.</th>
                                <th>Todo Name</th>
                                {{-- <th>Category Name</th> --}}
                                {{-- <th>Sub-C Name</th> --}}
                                <th>Project Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                            <tbody id="list">
                                @foreach ($getalldata as $editdata)
                                    {{-- @dd($editdata->category->category_name); --}}
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $editdata->todo_name }}</td>
                                        {{-- <td>{{ $editdata->category->category_name }}</td> --}}
                                        {{-- <td>{{ $editdata->sub->sub_name }}</td> --}}
                                        <td>{{ $editdata->project->project_name }}</td>
                                        <td> <a href="{{ route('tododata.edit', $editdata->id) }}"
                                                class="btn btn-dark">Edit</a> </td>
                                        <td>
                                            <form action="{{ route('tododata.destroy', $editdata->id) }}" method="post">
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
@endsection
