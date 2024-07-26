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
<<<<<<< HEAD
=======
Route::resource('questions', QuestionController::class)->except(['show']);
Route::get('/questAnswer', [PageController::class, 'index'])->name('questAnswer');
Route::get('/questions/index', [QuestionController::class, 'index'])->name('questions.index');
>>>>>>> fddc7227e2a16386d8831b6966ef3473e83ac8fc
