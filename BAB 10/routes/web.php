<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\newsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('dashboard');
});
Route::get('/news', [newsController::class, 'index']);
Route::get('/news/tambah', [newsController::class, 'create']);
Route::post('/news/store', [newsController::class, 'store']);
Route::get('/news/edit/{id}', [newsController::class, 'edit']);
Route::put('/news/update/{id}', [newsController::class, 'update']);
Route::get('/news/hapus/{id}', [newsController::class, 'delete']);
Route::get('/news/destroy/{id}', [newsController::class, 'destroy']);
Route::get('news/view/pdf', [newsController::class, 'view_pdf']);