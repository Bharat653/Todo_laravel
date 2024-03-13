<?php

namespace App\Repositories;

use App\Models\Project;
use App\Models\Category;

class ProjectRepository
{
    function store($data)
    {

        try {
            // dd($data);
            $res = Project::create($data);
           
            if ($res) {
                return  [
                    'status' => true,
                    'message' => 'Project created',
                    'code' => 200,
                ];
                return redirect('/resorces/views/project');
            }

            throw new \Exception("Something went wrong! Please try again", 1);
        } catch (\Throwable $th) {
            return ['status' => false, 'code' => 400, 'message' => $th->getMessage()];
        }
    }
}