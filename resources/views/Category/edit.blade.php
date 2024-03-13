<!-- Bootstrap Navigation Bar -->
@extends('layout.editl')

<div class="container">
    <div class="wrapper">
        <div class="title"><span>Edit Category</span></div>
        <form action="{{ route('category.update', $getallcategory->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="row">
                        <i class="fas fa-book"></i>
                        <input type="text" name="category_name"
                            value="{{ isset($getallcategory) ? $getallcategory->category_name : '' }}"
                            placeholder="category_name" required>
                    </div>
                </div>
            </div>
            <div class="row button">
                <input type="submit" value="submit" name="submit">
            </div>
        </form>
    </div>
</div>
