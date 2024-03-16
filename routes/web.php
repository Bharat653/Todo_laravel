<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TodoDataController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dashboard2Controller;
use App\Http\Controllers\InsertController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('materialdashboard');
});

Route::resource('register',RegisterController::class);

Route::resource('login', LoginController::class);
Route::post('/login',[LoginController::class,'getdata'])->name('login.getdata');


Route::resource('dashboard',DashboardController::class)->middleware('checkadmin');
Route::get('/logout',[DashboardController::class,'logout'])->name('logout');

Route::resource('dashboard2',Dashboard2Controller::class)->middleware('checkuser');
Route::get('/logout',[Dashboard2Controller::class,'logout'])->name('logout');


Route::get('/categorydata',[CategoryController::class,'categorydata'])->name('categorydata');
Route::resource('category',CategoryController::class)->middleware('checklogin');

Route::get('getsearch',[TodoDataController::class,'getsearch'])->name('getsearch');
Route::resource('list',ListController::class)->middleware('checkuser');
Route::resource('tododata',TodoDataController::class)->middleware('checklogin');


Route::post('getprojectbysub',[ListController::class,'getprojectbysub'])->name('getprojectbysub');
Route::get('/subdata',[SubController::class,'subdata'])->name('subdata');
Route::resource('sub',SubController::class)->middleware('checklogin');



Route::get('/projectdata',[ProjectController::class,'projectdata'])->name('projectdata');
Route::resource('project',ProjectController::class)->middleware('checklogin');
Route::post('getsubBycategory',[ProjectController::class,'getsubBycategory'])->name('getsubBycategory');


Route::resource('insert',InsertController::class);