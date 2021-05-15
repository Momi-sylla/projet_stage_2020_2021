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

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/VueUser',[App\Http\Controllers\ControlleurUser::class, 'index'])->name('index');
Route::post('/VueUser',[App\Http\Controllers\ControlleurUser::class, 'store'])->name('store');
Route::match(['Post','Put'],'/VueUser/{id}',[App\Http\Controllers\ControlleurUser::class, 'update'])->name('update');
Route::get('/EditUser/{id}',[App\Http\Controllers\ControlleurUser::class, 'edit'])->name('edit');
Route::get('/VueUser/{id}',[App\Http\Controllers\ControlleurUser::class, 'delete'])->name('delete');

Route::get('/enseignants',[App\Http\Controllers\ControleurEnseignant::class, 'index'])->name('index');

Route::post('/enseignants',[App\Http\Controllers\ControleurEnseignant::class, 'store'])->name('store');

