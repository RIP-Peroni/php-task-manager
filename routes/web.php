<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('task_statuses', \App\Http\Controllers\TaskStatusController::class)->except('show');
Route::resource('tasks', \App\Http\Controllers\TaskController::class);
Route::resource('labels', \App\Http\Controllers\LabelController::class)->except('show');

Auth::routes();
