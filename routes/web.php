<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/', [HomeController::class, 'show']);
Route::post('subscribe', [HomeController::class, 'subscribe']);
Route::get('service/categories/{id}', [ServiceController::class, 'show']);
Route::get('service/{id}', [ServiceController::class, 'browse']);
Route::get('service/{service_id}/{id}', [ServiceController::class, 'browse_sub']);
Route::post('request-callback/', [ServiceController::class, 'callback']);
Route::get('projects/', [ProjectController::class, 'show']);
Route::get('project/{id}', [ProjectController::class, 'browse']);
Route::get('project/{cat_id}/{id}', [ProjectController::class, 'browse_detail']);
Route::get('about-us/', [AboutController::class, 'show']);
Route::get('team/{id}', [AboutController::class, 'browse']);
Route::get('our-team/', [AboutController::class, 'team']);
Route::get('our-partner/', [AboutController::class, 'partner']);
Route::get('contact/', [AboutController::class, 'contact']);
Route::post('contact/submit', [AboutController::class, 'contactSubmit']);
Route::get('blog/', [BlogController::class, 'show']);
Route::get('blog/search/', [BlogController::class, 'search']);
Route::get('blog/{id}', [BlogController::class, 'browse']);
Route::get('blog/categories/{id}', [BlogController::class, 'categories']);