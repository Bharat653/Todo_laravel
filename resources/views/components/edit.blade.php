@php
    $getcategory = category()->pluck('category_name','id');
@endphp
<div class="container">
    <div class="wrapper">
        <div class="title"><span>{{$title}}</span></div>

        <form action="{{$action}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method($method)
            <div class="row">
                <i class="fas fa-book"></i>
                <select name="category_id" id="category" class="form-control input-sm" required>
                    @foreach ($getcategory as $id => $name)
                        <option value="{{ $id }}" {{ isset($subCategory) && $subCategory->category_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="row">
                        <i class="fas fa-book"></i>
                        <input type="text" name="sub_name" value={{$subCategory->sub_name ?? ""}}   >
                    </div>
                </div>
            </div>

            <div class="row button">
                <input type="submit" value="{{$button}}" name="submit">
            </div>
        </form>
    </div>
</div>