<?php

namespace App\Services;

use App\Repositories\SubRepository;

class SubService
{

    function store($request)
    {

        $data = $request->only('category_id','sub_name');
        // dd($data);
        return (new SubRepository)->store($data);
    }
}
