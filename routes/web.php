<?php

use Illuminate\Support\Facades\Route;


use \App\Http\Controllers\DocumentController;
use \App\Http\Controllers\DashboardController;
use \App\Http\Controllers\ProjectController;
use \App\Http\Controllers\UserController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboards', function () {
    return view('dashboards.index');
})->name('dashboards');

Route::group(['middleware' => 'auth'], function () {
Route::resource('documents', DocumentController::class);
Route::resource('users', UserController::class);
Route::resource('projects', ProjectController::class);
Route::resource('dashboards', DashboardController::class);

Route::get('/search', [DashboardController::class, 'search']);

Route::get('documents/{document}/download',[DocumentController::class, 'download'])->name('files.download');
});

