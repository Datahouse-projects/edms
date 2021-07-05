<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentUploadController;
use App\Http\Controllers\KeywordController;
use App\Http\Controllers\FormController;

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



Route::get('file-upload', [DocumentUploadController::class, 'index']);
Route::post('store', [DocumentUploadController::class, 'store']);


Route::resources([
	'forms' => FormController::class,
    'keywords' => KeywordController::class,
]);




