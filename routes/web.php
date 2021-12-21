<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [TodosController::class, 'index']);
Route::post('/', [TodosController::class, 'store']);
Route::post('/', [TodosController::class, 'create'])->name('create');
Route::put('/todo/update/{id}', [TodosController::class, 'update'])->name('update');
Route::delete('/todo/delete/{id}', [TodosController::class, 'delete'])->name('delete');
