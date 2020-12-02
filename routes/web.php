<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::view('/','welcome');
//用户管理
Route::prefix('user')->group(function(){
    Route::view('create','user.create');
    Route::post('store',[UserController::class,'store'])->name('user.store');
});
