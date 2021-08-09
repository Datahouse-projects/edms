<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentUploadController;
//use App\Http\Controllers\KeywordController;
// use App\Http\Controllers\FormController;
// use App\Http\Controllers\UserController;
// use App\Http\Controllers\RoleController;
// use App\Http\Controllers\GroupController;

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


// Route::resources([
// 	'forms' => FormController::class,
//     'keywords' => KeywordController::class,
// ]);


Auth::routes();


// Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function() {
            Route::resources([
                'forms' => App\Http\Controllers\FormController::class,
                'fields' => App\Http\Controllers\FieldController::class,
                'keywords' => App\Http\Controllers\KeywordController::class,
                'users' => App\Http\Controllers\UserController::class,
                'roles' => App\Http\Controllers\RoleController::class,
                'groups' => App\Http\Controllers\GroupController::class,
            ]);
});






Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
