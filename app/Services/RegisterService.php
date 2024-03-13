<?php

 namespace App\Services;

 use App\Repositories\RegisterRepository;

 class RegisterService {

    function store($request){

        $data = $request->only('name','email','password');
        // dd($data);
        return (new RegisterRepository)->store($data);
    }
 }

?>