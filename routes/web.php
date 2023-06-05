<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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
    return view('email_form');
});

Route::get('/test', function () {
    return Public_path('photos').'\companions';
});
// Route::get('/email_form', function () {
//     return view('welcome');
// });

Route::post('send-mail',[MainController::class,'sendMail']);
Route::post('second-page',[MainController::class,'secondPage']);
Route::post('third-page',[MainController::class,'thirdPage']);
Route::post('review-data',[MainController::class,'reviewData']);
Route::post('submit-data',[MainController::class,'submitData']);




Route::get('/mobile-verification', function () {
    return view('mobile_verification');
});
