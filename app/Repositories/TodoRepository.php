<?php

namespace App\Repositories;

use App\Models\Todo;
use App\Models\Category;

class TodoRepository
{
    function store($data)
    {

        try {
            // dd($data);
            $res = Todo::create($data);
            // dd($res);
           
            if ($res) {
                return  [
                    'status' => true,
                    'message' => 'Todo created',
                    'code' => 200,
                ];
                return redirect('/resorces/views/list');
            }

            throw new \Exception("Something went wrong! Please try again", 1);
        } catch (\Throwable $th) {
            return ['status' => false, 'code' => 400, 'message' => $th->getMessage()];
        }
    }
}