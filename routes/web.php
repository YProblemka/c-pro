<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\OurWorkController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
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


Route::prefix("action")->group(function () {
//    Route::middleware("auth:admin")->group(function () {
    Route::apiResource("service", ServiceController::class)->missing(
        fn() => response()->json(["message" => "No query results for model \"Service\""], 404)
    );

    Route::apiResource("setting", SettingController::class)->scoped([
        'setting' => 'name',
    ])->missing(
        fn() => response()->json(["message" => "No query results for model \"Setting\""], 404)
    )->except(["destroy", "store"]);

    Route::apiResource("our_work", OurWorkController::class)->missing(
        fn() => response()->json(["message" => "No query results for model \"OurWork\""], 404)
    )->except(["destroy", "store"]);

    Route::apiResource("post", PostController::class)->missing(
        fn() => response()->json(["message" => "No query results for model \"Post\""], 404)
    )->except(["destroy", "store"]);

    Route::post('/post/add_img', [ServiceController::class, 'addImg'])->name("addImg");

    Route::post('/post/del_img', [ServiceController::class, 'delImg'])->name("delImg");
//    });
});

Route::prefix("administration")->name("admin.")->group(function () {
    Route::get('/login', [AdminAuthController::class, "loginPage"])->name("login.page")->middleware("guest");
    Route::post('/login', [AdminAuthController::class, "login"])->name("login")->middleware("guest");
    Route::get('/logout', [AdminAuthController::class, "logout"])->name("logout")->middleware("auth:admin");

    Route::middleware("auth:admin")->group(function () {
        Route::get('/admin/settings', function () {
            return view('admin/settings');
        })->name("admin.settings");
    });

});
