<?php

namespace App\Services;

use App\Repositories\ProjectRepository;

class ProjectService
{

    function store($request)
    {

        $data = $request->only('category_id','sub_id','project_name');
        // dd($data);
        return (new ProjectRepository)->store($data);
    }
}
