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
    return view('auth.login');
});

Auth::routes(['register' => false]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/VueUser',[App\Http\Controllers\ControlleurUser::class, 'index'])->name('index');
Route::post('/VueUser',[App\Http\Controllers\ControlleurUser::class, 'store'])->name('store');

Route::match(['Post','Put'],'/VueUser/{id}',[App\Http\Controllers\ControlleurUser::class, 'update'])->name('update');
Route::get('/EditUser/{id}',[App\Http\Controllers\ControlleurUser::class, 'edit'])->name('edit');
Route::get('/VueUser/{id}',[App\Http\Controllers\ControlleurUser::class, 'delete'])->name('delete');

Route::get('/enseignants',[App\Http\Controllers\ControleurEnseignant::class, 'indexEnseignants'])->name('indexEnseignants');
Route::post('/enseignants',[App\Http\Controllers\ControleurEnseignant::class, 'storeEnseignants'])->name('storeEnseignants');


Route::get('/matieres',[App\Http\Controllers\ControleurMatiere::class, 'indexMatieres'])->name('indexMatieres');
Route::post('/matieres',[App\Http\Controllers\ControleurMatiere::class, 'storeMatieres'])->name('storeMatieres');


Route::get('/showMatiere/{id}',[App\Http\Controllers\ControleurMatiere::class, 'show'])->name('show');

Route::post('/showMatiere/{id}',[App\Http\Controllers\ControleurMatiere::class, 'storeseances'])->name('storeseances');

Route::get('/vueMatiere/{id}',[App\Http\Controllers\ControleurUserMatiere::class, 'userindex'])->name('userindex');
Route::post('editseancesalle',[App\Http\Controllers\ControleurUserMatiere::class, 'editseancesalle'])->name('editseancesalle');
Route::post('ajoutcontrainte',[App\Http\Controllers\ControleurUserMatiere::class, 'ajoutcontrainte'])->name('ajoutcontrainte');
Route::post('deletecontr',[App\Http\Controllers\ControleurUserMatiere::class, 'deletecontr'])->name('deletecontr');
