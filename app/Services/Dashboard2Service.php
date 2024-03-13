<?php

 namespace App\Services;

 use App\Repositories\Dashboard2Repository;

 class Dashboard2Service {

    function store($request){
        // dd($request);
        $data = $request->only('list','register_id');
    //    dd($data);
        return (new Dashboard2Repository)->store($data);
    }
 }

?>