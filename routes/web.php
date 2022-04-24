<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\DB;



Route::resource('task',TaskController::class);

Route::get('/', function () {
    return "hellow";
});
