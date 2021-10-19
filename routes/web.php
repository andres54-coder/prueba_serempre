<?php


use App\Http\Controllers\clientController;
use App\Http\Controllers\userController;
use App\Http\Controllers\cityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportExcelController;
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
require __DIR__.'/auth.php';
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('import', [ImportExcelController::class,'index'])->name('import.index')->middleware(['auth']);
Route::post('import/store', [ImportExcelController::class,'store'])->name('import.store')->middleware(['auth']);
Route::get('import/export', [ImportExcelController::class,'export'])->name('import.export')->middleware(['auth']);
Route::resource('city', cityController::class)->middleware(['auth']);
Route::resource('client', clientController::class)->middleware(['auth']);
Route::resource('user', userController::class)->middleware(['auth']);


