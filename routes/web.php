<?php

use App\Http\Controllers\RgController;
use App\Http\Controllers\DataControl;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class, 'index'])->name('home');
//Register

Route::get('/createReg', function()
{
    return view('register.regTambah');
});
Route::post('/addReg',[RgController::class, 'addData']);

//Login
Route::get('/login', [LoginController::class,'index'])->name('login');

Route::post('/logincheck', [LoginController::class, 'aunthenticate']);


Route::get('/logout', function(){
    Auth::logout();
    return redirect('/login');
});


Route::middleware(['auth'])->group(function(){
// Register
Route::get('/regAll', [RgController::class, 'index']);
Route::get('/showReg/{id}', [RgController::class, 'ShowOneData']);
Route::put('/UpdateData/{id}', [RgController::class, 'UpdateData']);
Route::delete('/deleteReg/{id}', [RgController::class, 'deleteData']);
Route::get('/searchReg', [RgController::class, "search"]);

// Biodata
Route::get('/createpost', function () {
    return view('pages.tambahBiodata');
});
Route::post('/simpanBiodata', [DataControl::class,"saveBiodata"]);
Route::delete('deletethis/{id}',[DataControl::class,"deleteData"]);
Route::get('/ubahView/{id}', [DataControl::class,"ubahView"]);
Route::put('/ubahData/{id}', [DataControl::class,"ubahData"]);
Route::get('/search', [HomeController::class, "search"]);

// Profile
Route::get('/profile', [ProfileController::class, "profile"]);
});
