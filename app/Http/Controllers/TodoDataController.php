<?php

namespace App\Http\Controllers;

use App\Models\Sub;
use App\Models\Todo;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;

class TodoDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $gettododata = Todo::get();
        // dd($gettododata);

        $getcategory = Category::get();

        $search = $request['search'] ?? "";

        if ($search != "") {
            $getalldata = Todo::where('todo_name', 'LIKE', "%$search%")->get();
            // dd( $getalldata);
        } else {
            $getalldata = Todo::get();
        }
        return view('Todo.tododata', compact('getalldata', 'search', 'getcategory', 'gettododata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function getsearch(Request $request)
    {
        $id = $request->ids ?? [];
        $todolist = Todo::whereIn('id', $id)->get();
        return [
            'html' => view('Todo.todoajax', compact('todolist'))->render(),
            'status' => true,

        ];
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $getcategory = Category::get();
        $getsub = Sub::get();

        $getproject = Project::get();

        // dd($getsub);
        $getalldata = Todo::find($id);
        // dd($getalldata);
        if ($getalldata == null) {
            abort('403');
        } else {
            return view('Todo.edit', compact('getalldata', 'getcategory', 'getsub', 'getproject'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $getalldata = Todo::find($id);
        // dd($getalldata);
        if ($getalldata == null) {
            abort('403');
        } else {
            $getalldata->todo_name = $request->input('todo_name');
            // $getalldata->category_id =$request->input('category_id');
            // $getalldata->sub_id =$request->input('sub_id');
            $getalldata->project_id = $request->input('project_id');
            // dd($getalldata);
            $getalldata->save();
            return redirect()->route('tododata.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $getalldata = Todo::find($id);
        // dd($getalldata);
        $getalldata->delete($id);
        return redirect()->route('tododata.index');
    }
}
