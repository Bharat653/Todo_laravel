<?php

namespace App\Http\Controllers;

use id;
use App\Models\Sub;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\ProjectService;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $getalldata = Project::get();
        $getcategory = Category::pluck('category_name', 'id')->toArray();

        $selectedCategoryIds = Sub::distinct()->pluck('category_id')->toArray();


        $getsubcategory = [];

        if (!empty($selectedCategoryIds)) {
            $getsubcategory = Sub::whereIn('category_id', $selectedCategoryIds)->pluck('sub_name', 'id');
        }

        return view('Project.project', compact('getcategory', 'getsubcategory', 'getalldata'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function getsubBycategory(Request $request)
    {
        $category_id = $request->id;

        $subCategories = Sub::where('category_id', $category_id)->pluck('sub_name', 'id');

        return response()->json(['subCategories' => $subCategories]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['category_id' => 'required', 'sub_id' => 'required', 'project_name' => 'required']);
        $respo = (new ProjectService)->store($request);
        // dd($respo);
        if ($respo['status']) {
            return redirect('/project')->withsuccess($respo['message']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(string $id)
    {
        $getcategory = Category::get();
        $getsub = Sub::get();
        $getalldata = Project::find($id);
        if($getalldata == null) {
            abort ('403');
        }
        else {
            return view('Project.edit', compact('getalldata','getcategory','getsub'));
        }
    }

  
    


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $getalldata = Project::find($id);
        if($getalldata == null) {
            abort ('403');
        }
        else {
            $getalldata->sub_id = $request->input('sub_id');
            
            $getalldata->project_name = $request->input('project_name');
            // dd( $getalldata->project_name);

            $getalldata->save();

            return redirect()->route('project.index');
        }
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $getalldata = Project::find($id);
        // dd($getalldata);
        $getalldata->delete($id);
        return redirect()->route('project.index');
    }
}
