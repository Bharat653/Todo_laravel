<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    function store($data)
    {

        try {
            // dd($data);
            $res = Category::create($data);
           
            if ($res) {
                return  [
                    'status' => true,
                    'message' => 'Category created',
                    'code' => 200,
                ];
                return redirect('/resorces/views/category');
            }

            throw new \Exception("Something went wrong! Please try again", 1);
        } catch (\Throwable $th) {
            return ['status' => false, 'code' => 400, 'message' => $th->getMessage()];
        }
    }
}
