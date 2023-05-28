<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;


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


Route::get('/data/export', [DataController::class, 'export'])->name('data.export')->middleware('auth');
Route::post('/data/import', [DataController::class, 'import'])->name('data.import')->middleware('auth');
Route::get('/', [DataController::class, 'index'])->name('data.index')->middleware('auth');
Route::get('/create', [DataController::class, 'create'])->name('data.create')->middleware('auth');
Route::post('/store', [DataController::class, 'store'])->name('data.store')->middleware('auth');
Route::get('/{data}/edit', [DataController::class, 'edit'])->name('data.edit')->middleware('auth');
Route::put('/data/{data}', [DataController::class, 'update'])->name('data.update')->middleware('auth');
Route::delete('/data/{id}/destroy', [DataController::class, 'destroy'])->name('data.destroy')->middleware('auth');
Route::get('/data/{id}', [DataController::class, 'show'])->name('data.show')->middleware('auth');
Route::get('/home', [DataController::class, 'home'])->name('data.home')->middleware('auth');





Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/profile/edit', function () {
    return view('profile.edit');
})->name('profile.edit');



require __DIR__.'/auth.php';