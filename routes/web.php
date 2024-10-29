<?php

use App\Http\Controllers\CourseStudentController;
use App\Http\Controllers\ManyToManyPolymorphic;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RelationController;
use App\Http\Controllers\OneToManyPolymorphic;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/onetoone', [RelationController::class, 'index']);
Route::get('/onetomany', [OneToManyPolymorphic::class, 'index']);
Route::get('/manytomany', [ManyToManyPolymorphic::class, 'index']);

Route::get('/manyrelation', [CourseStudentController::class, 'index']);
