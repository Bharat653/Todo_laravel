@extends('layout.editl')
<!-- Bootstrap Navigation Bar -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>User Dashboard</title>

</head>

<div class="container">
    <div class="wrapper">
        <div class="title"><span>Edit Todo</span></div>
        {{-- @dd($getalldata); --}}
        {{-- @dd($getcategory); --}}
        {{-- @dd($getsub); --}}
        <form action="{{ route('tododata.update', $getalldata->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                    <i class="fas fa-book"></i>
                    <select name="category_id" id="category" class="form-control input-sm" required>
                        <option>Select Category</option>
                        @foreach ($getcategory as $category)
                            <option value="{{ $category->id }}" @if ($category->id == $getalldata->category_id) selected @endif>
                                {{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
            
                <div class="row">
                    <i class="fas fa-book"></i>
                    <select name="sub_id" id="sub" class="form-control input-sm" disabled required>
                        <option>Select Sub</option>
                        @foreach ($getsub as $sub)
                            <option value="{{ $sub->id }}" @if ($sub->id == $getalldata->sub_id) selected @endif>
                                {{ $sub->sub_name }}</option>
                        @endforeach
                    </select>
                </div>

            <div class="row">
                <i class="fas fa-book"></i>
                <select name="project_id" id="project" class="form-control input-sm" disabled required>
                    <option>Select Project</option>
                    @foreach ($getproject as $project)
                        <option value="{{ $project->id }}" @if ($project->id == $getalldata->project_id) selected @endif>
                            {{ $project->project_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="row">
                        <i class="fas fa-book"></i>
                        <input type="text" name="todo_name"
                            value="{{ isset($getalldata) ? $getalldata->todo_name : '' }}" placeholder="Todo Name"
                            required>
                    </div>
                </div>
            </div>
            <div class="row button">
                <input type="submit" value="Save" name="submit">
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-rHyoN1iRsVXV4nDqO9Qaiw8hKd6vbXU7YU9qWOqI01iyJDlYQ5vgEFudI5I6k7lJ" crossorigin="anonymous">
</script>

<script>
    $(document).ready(function() {
        $('#category').change(function() {
            // alert("heyy");
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

    $(document).ready(function() {
        $('#sub').change(function() {
            var id = $(this).val();
            var token = "{{ csrf_token() }}";
            $.ajax({
                type: "post",
                url: "{{ route('getprojectbysub') }}",
                data: {
                    id: id,
                    _token: token
                },
                success: function(data) {
                    var projectdata = $('#project');
                    projectdata.empty();

                    projectdata.append('<option selected>Select Project</option>');

                    $.each(data.subCategories2, function(id, name) {
                        projectdata.append('<option value="' + id + '">' +
                            name + '</option>');
                    });
                    projectdata.prop('disabled', false);
                },
            });
        });
    });
</script>
