<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\DB;

Route::get('/tasks',[TaskController::class,'index'])->name('tasks');
Route::get('/tasks/{id}',[TaskController::class,'show'])->name('show');
Route::post('store',[TaskController::class,'store'])->name('store');
Route::post('delete/{id}',[TaskController::class,'delete'])->name('delete');
Route::post('edit/{id}',[TaskController::class,'edit'])->name('edit');
Route::post('edit',[TaskController::class,'update'])->name('update');


Route::get('/', function () {
    return "hellow";
});
