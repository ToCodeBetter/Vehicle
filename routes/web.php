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
    Route::view('create','user.create')->name('user.create');
    Route::post('store',[UserController::class,'store'])->name('user.store');
    Route::delete('delete',[UserController::class,'delete'])->name('user.delete');
    Route::get('show',[UserController::class,'show'])->name('user.show');
    Route::get('edit',[UserController::class,'edit'])->name('user.edit');
    Route::put('update',[UserController::class,'update'])->name('user.update');
    Route::delete('delete',[UserController::class,'delete'])->name('user.delete');
});
