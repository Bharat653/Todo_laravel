<?php

namespace App\Repositories;

use App\Models\Register;

class RegisterRepository {

    function store($data)
    {
        try {
            // dd($data);
            $res = Register::create($data);

            // dd($res);
            if ($res) {
                return  [
                    'status' => true,
                    'message' => 'register created',
                    'code' => 200,
                ];
                return redirect('/resources/views/register');
            }

            throw new \Exception("Something went wrong! Please try again", 1);
        } catch (\Throwable $th) {
            return ['status' => false, 'code' => 400, 'message' => $th->getMessage()];
        }
    }
}


?>