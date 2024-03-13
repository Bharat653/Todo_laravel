<?php

namespace App\Repositories;

use App\Models\Usertodo;

class Dashboard2Repository {

    function store($data)
    {
        try {
            // dd($data);
            $res = Usertodo::create($data);

            // dd($res);
            if ($res) {
                return  [
                    'status' => true,
                    'message' => 'Usertodo created',
                    'code' => 200,
                ];
                return redirect('/resources/views/dashboard.dashboard2');
            }

            throw new \Exception("Something went wrong! Please try again", 1);
        } catch (\Throwable $th) {
            return ['status' => false, 'code' => 400, 'message' => $th->getMessage()];
        }
    }
}


?>