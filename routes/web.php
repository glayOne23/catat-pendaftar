<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatatanController;

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
//     return view('create');
// });

Route::get('/', [CatatanController::class, 'index'])->name("index");
Route::get('/create', [CatatanController::class, 'create'])->name("create");
Route::get('/export', [CatatanController::class, 'export'])->name("export");
Route::post('/', [CatatanController::class, 'store'])->name("store");
Route::put('/{catatan}', [CatatanController::class, 'update'])->name("update");
Route::delete('/{catatan}', [CatatanController::class, 'destroy'])->name("destroy");


