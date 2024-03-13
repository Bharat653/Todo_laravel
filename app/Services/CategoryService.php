<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{

    function store($request)
    {

        $data = $request->only('register_id','category_name');
        // dd($data);
        return (new CategoryRepository)->store($data);
    }
}