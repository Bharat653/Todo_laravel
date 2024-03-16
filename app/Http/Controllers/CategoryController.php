<?php

namespace App\Http\Controllers;

// use App\Http\Requests\DepartmentRequest;
use App\Models\Category;
// use App\Service\CategoryService;
use Illuminate\Http\Request;
use App\Services\CategoryService;
// use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $getalldata = Category::get();
        return view('category.category',compact('getalldata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function categorydata( Request $request) {
        // dd($request);
        $getalldata = Category::get();
        return view('Category.Categorydata',compact('getalldata'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate(['register_id' => 'required','category_name' =>'required']);
        $respo = (new CategoryService)->store($request);
        // dd($respo);
        if($respo['status']) {
            return redirect('/category')->withsuccess($respo['message']);
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
        $getallcategory = Category::find($id);
        // dd(  $getalluser);

        if($getallcategory == null) {
            abort (403,'user Not Found');
          }
          else{
            return view ('category.edit',compact('getallcategory'));
          }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $getallcategory = Category::find($id);
        // dd($getallcategory);
        if($getallcategory == null) {
            abort('403');
        }
        else {
            $getallcategory->category_name =$request->input('category_name');

            // dd($getalldata);
            $getallcategory->save();
            return redirect()->route('category.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        $getalldata = Category::find($id);
        // dd($getalldata);
        $getalldata->delete($id);
        return redirect()->route('category.index');
    }
}
