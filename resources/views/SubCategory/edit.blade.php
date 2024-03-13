@extends('layout.editl')
    <!-- Bootstrap Navigation Bar -->
  

    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Edit Sub-Category</span></div>
            <form action="{{ route('sub.update',$getalldata->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="row">
                    <i class="fas fa-book"></i>
                    <select name="category_name" id="category" class="form-control input-sm" readonly required>
                        <option>Select Catgeory</option>
                        @foreach ($getcategory as $category)
                        <option value="{{$category->id}}" @if($category->id == $getalldata->category_id) selected @endif>{{ $category->category_name }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="row">
                            <i class="fas fa-book"></i>
                            <input type="text" name="sub_name" value="{{isset($getalldata) ? $getalldata->sub_name : ''}}" placeholder="Sub_name" required>
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


