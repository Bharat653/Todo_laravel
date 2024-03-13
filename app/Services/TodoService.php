<?php

namespace App\Services;

use App\Repositories\TodoRepository;

class TodoService
{

    function store($request)
    {

        $data = $request->only('category_id','sub_id','project_id','todo_name');
        // dd($data);
        return (new TodoRepository)->store($data);
    }
}
