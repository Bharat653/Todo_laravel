<?php

namespace App\Http\Controllers;

use App\Models\Sub;
use App\Models\Project;
use App\Models\Category;
use App\Services\TodoService;
use Illuminate\Http\Request;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getcategory = Category::pluck('category_name', 'id')->toArray();

    
        // $selectedCategoryIds = Sub::distinct()->pluck('category_id')->toArray();
        $selectedCategoryIds2 = Project::distinct()->pluck('sub_id')->toArray();
        // dd($selectedCategoryIds2);

    
        $getsubcategory = [];
        
        // if (!empty($selectedCategoryIds)) {
        //     $getsubcategory = Sub::whereIn('category_id', $selectedCategoryIds)->pluck('sub_name', 'id');
        // } 
        if (!empty($selectedCategoryIds2)) {
            $getsubcategory = Project::whereIn('sub_id', $selectedCategoryIds2)->pluck('project_name', 'id');
            // dd($getsubcategory);
        } 
    
        return view('Todo.todolist',compact('getcategory','getsubcategory',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function getprojectbysub(Request $request){
        $category_id = $request->id;
        $sub_id = $request->id;
    
        // $subCategories = Sub::where('category_id', $category_id)->pluck('sub_name', 'id');
        $subCategories2 = Project::where('sub_id', $sub_id)->pluck('project_name', 'id');
        // dd( $subCategories2);
        
    
        return response()->json(['subCategories2' => $subCategories2]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate(['category_id' =>'required','sub_id' =>'required' ,'project_id' =>'required','todo_name' =>'required']);
        $respo = (new TodoService)->store($request);
        // dd($respo);
        if($respo['status']) {
            return redirect('/list')->withsuccess($respo['message']);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
