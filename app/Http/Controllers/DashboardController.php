<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getalluser = Register::get();
        // dd($getalluser);
        return view('admin.dashboard',compact('getalluser'));
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
        //
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
        // dd($id);
        $getalluser = Register::find($id);
        // dd(  $getalluser);

        if($getalluser == null) {
            abort (403,'user Not Found');
          }
          else{
            return view ('Admin.edit',compact('getalluser'));
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
        // dd($request);
        $getalluser = Register::find($id);
        // dd($getalluser);

        if($getalluser == null) {
            return abort('403');
        }

        $getalluser->name = $request->input('name');
        $getalluser->email = $request->input('email');
        // $getalluser->password = $request->input('password');
        $getalluser->save();

        return redirect()->route('dashboard.index')->with('status','updated');

        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $getuserbyadmin = Register::find($id);
        // dd($employee);
    
        if (!$getuserbyadmin) {
            return redirect()->route('dashboard.index')->with(['danger' => 'admin not found']);
        }
    
        if ($getuserbyadmin->role == 1) {
            return redirect()->route('dashboard.index')->with(['danger' => 'Cannot delete admin ']);
        }
    
        $getuserbyadmin->delete();
    
        return redirect()->route('dashboard.index')->with(['success' => 'dashboard deleted successfully']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }
}
