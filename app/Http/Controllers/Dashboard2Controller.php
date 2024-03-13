<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Models\Usertodo;
use App\Services\Services;
use Illuminate\Http\Request;

use App\Services\Dashboard2Service;
use Illuminate\Support\Facades\Auth;

class Dashboard2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getUser = Auth::user();
    
        $todoData = Usertodo::where('register_id', $getUser->id)->get();
        // dd($todoData);
    
        return view('user.dashboard2', compact('todoData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate(['list' =>'required']);

        $res = (new Dashboard2Service)->store($request);

        if($res['status']){
            return redirect('/dashboard2')->withsuccess(['message']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getuserbyuser = Usertodo::find($id);
        // dd( $getuserbyuser);
        if($getuserbyuser == null){
            return abort('403');
        }
        else {
            return view('user.edit',compact('getuserbyuser'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $getuserbyuser = Usertodo::find($id);

       if($getuserbyuser == null) {
        return abort('403');
       }
       $getuserbyuser->list = $request->input('list');

       $getuserbyuser->save();
       return redirect()->route('dashboard2.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $getdashboard2_id = Usertodo::find($id);
        // dd($getdashboard2_id);
        $getdashboard2_id->delete($id);
        return redirect()->route('dashboard2.index');

    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }
}
