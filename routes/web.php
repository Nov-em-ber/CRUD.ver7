<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/' , function() {
    return redirect('/members');
});

Route::prefix('members')->group(function(){
    Route::get('/' , [MemberController::class, 'index'])->name('members.index');
    Route::get('create' , [MemberController::class, 'create'])->name('members.create');
    Route::post('/' , [MemberController::class , 'store'])->name('members.store');
    Route::get('{member}/edit',[MemberController::class, 'edit'])->name('members.edit');
    Route::put('{member}', [MemberController::class,'update'])->name('members.update');
    Route::delete('{member}',[MemberController::class,'destroy'])->name('members.destroy');
});
