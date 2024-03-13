<?php

namespace App\Repositories;

use App\Models\Sub;

class SubRepository
{
    function store($data)
    {

        try {
            // dd($data);
            $res = Sub::create($data);
           
            if ($res) {
                return  [
                    'status' => true,
                    'message' => 'Sub_Category created',
                    'code' => 200,
                ];
                return redirect('/resorces/views/subp;');
            }

            throw new \Exception("Something went wrong! Please try again", 1);
        } catch (\Throwable $th) {
            return ['status' => false, 'code' => 400, 'message' => $th->getMessage()];
        }
    }
}