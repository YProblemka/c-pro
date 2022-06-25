<?php

use App\Http\Controllers\ServiceController;
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
    return view('index');
})->name("index");

Route::get('/blog', function () {
    return view('blog');
})->name("blog");

Route::get('/service', function () {
    return view('service');
})->name("service");

Route::get('/blog-details', function () {
    return view('blog-details');
})->name("blog-details");

Route::get('/admin', function () {
    return view('admin/categories');
})->name("admin");


Route::prefix("action")->group(function () {
    Route::middleware("auth:admin")->group(function () {
        Route::apiResource("service", ServiceController::class)->missing(
            fn() => response()->json(["message" => "No query results for model \"Product\""], 404)
        );
    });
});
