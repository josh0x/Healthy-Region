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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('documents', \App\Http\ControllersDocumentController::class);
Route::resource('users', \App\Http\ControllersUserController::class);
Route::resource('projects', \App\Http\ControllersProjectController::class);
Route::get('documents/{document}/download',[ DocumentController::class , 'download'])->name('files.download');

});
