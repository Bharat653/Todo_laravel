@extends('layout.layout')

@section('content')


    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Add Todo</span></div>
            <form action="{{ route('list.store') }}" method="post" enctype="multipart/form-data">
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
                        {{-- @foreach ($getsubcategory as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach --}}
                    </select>
                </div>
                <div class="row">
                    <i class="fas fa-book"></i>
                    <select name="project_id" id="project" class="form-control input-sm" required disabled>
                        <option>Select Project</option>
                        {{-- @foreach ($getcategory as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach --}}
                    </select>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="row">
                            <i class="fas fa-book"></i>
                            <input type="text" name="todo_name" placeholder="Todo Name" required>
                        </div>
                    </div>
                </div>
                <div class="row button">
                    <input type="submit" value="submit" name="submit">
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

    $(document).ready(function(){
        $('#sub').change(function(){
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


@endsection