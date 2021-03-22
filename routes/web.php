<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResearcherController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\DocumentController;


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
    return view('home');
});

Route::resource('/news', NewsController::class);
Route::resource('/researchers', ResearcherController::class);
//Route::resource('/documents', DocumentController::class);
Route::get('/documents',[DocumentController::class,'index']);
Route::post('/documents',[DocumentController::class , 'store']);
Route::get('/documents/create',[DocumentController::class , 'create']);
Route::get('/documents/{document}',[DocumentController::class,'show']);
Route::get('documents/download/{document}',[DocumentController::class,'download']);