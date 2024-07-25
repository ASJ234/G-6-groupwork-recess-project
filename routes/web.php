<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('questions', QuestionController::class)->except(['show']);
Route::get('/questAnswer', [PageController::class, 'index'])->name('questAnswer');
Route::get('/questions/index', [QuestionController::class, 'index'])->name('questions.index');