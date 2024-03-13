<?php

namespace App\Http\Controllers;

use App\Models\Sub;
use App\Models\Category;
use App\Services\SubService;
use Illuminate\Http\Request;

class SubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getalldata = Sub::get();
        // dd($getalldata);
        $getcategory = Category::get()->pluck('category_name','id')->toArray();
        // dd($getcategory);
        return view('SubCategory.sub',compact('getcategory','getalldata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate(['category_id' =>'required','sub_name' =>'required']);
       $resp = (new SubService)->store($request);

       if($resp['status']){
        return redirect('/sub')->withsuccess($resp['message']);
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
        $getalldata = Sub::find($id);
        if($getalldata == null) {
            abort('403');
        }
        else{
            return view ('SubCategory.edit',compact('getalldata','getcategory'));
          }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $getallsub = Sub::find($id);
        if($getallsub == null) {
            abort('403');
        }
        else {
            $getallsub->category_id =  $request->input('category_name');
           
            $getallsub->sub_name =  $request->input('sub_name');
            // dd($getallsub);
            $getallsub->save();
            return redirect()->route('sub.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $getalldata = Sub::find($id);
        // dd($getalldata);
        $getalldata->delete($id);
        return redirect()->route('sub.index');
    }
}
