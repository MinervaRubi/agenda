<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CareerController;

Route::get('/', function () {
    return redirect()->route('students.index');
});

Route::resource('careers', CareerController::class);
Route::resource('students', StudentController::class);
