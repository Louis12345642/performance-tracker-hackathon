<?php

use App\Http\Controllers\AssigmentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\usersController;
use Illuminate\Support\Facades\Route;

Route::get("/user/{id}",[CourseController::class,'userCourses'])->name('user.courses');
Route::get('/assigment/{id}',[AssigmentController::class,'userAssigment'])->name('user.assigments');
Route::get('/students',[usersController::class,'courseStudents'])->name('course.users');
Route::put('/assigment/submit/{assigment_id}',[AssigmentController::class,'submitAssigment'])->name('assigment.submit');

