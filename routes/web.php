<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OurWorkController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Models\Post;
use App\Models\Service;
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
})->middleware("cache.page:15")->name("index");

Route::get('/blog', function () {
    $paginate = Post::query()->orderByDesc("updated_at")->paginate(3, ['*'], "p")
        ->withPath(route('blog'));
    return view('blog', compact("paginate"));
})->middleware("cache.page:15")->name("blog");

Route::get('/service/{service:id}', function (Service $service) {
    return view('service', compact('service'));
})->middleware("cache.page:15")->name("service");

Route::get('/blog-details/{post:id}', function (Post $post) {
    return view('blog-details', compact('post'));
})->middleware("cache.page:15")->name("blog-details");

Route::post('/email', [MailController::class, 'sendCustom'])->name("email");

Route::prefix("action")->group(function () {
    Route::middleware("auth:admin")->group(function () {
        Route::apiResource("service", ServiceController::class)->missing(
            fn () => response()->json(["message" => "No query results for model \"Service\""], 404)
        );

        Route::apiResource("setting", SettingController::class)->scoped([
            'setting' => 'name',
        ])->missing(
            fn () => response()->json(["message" => "No query results for model \"Setting\""], 404)
        )->except(["destroy", "store"]);

        Route::apiResource("our_work", OurWorkController::class)->missing(
            fn () => response()->json(["message" => "No query results for model \"OurWork\""], 404)
        )->except(["destroy", "store"]);

        Route::apiResource("post", PostController::class)->missing(
            fn () => response()->json(["message" => "No query results for model \"Post\""], 404)
        );

        Route::post('/post_img', [PostController::class, 'addImg'])->name("addImg");
        Route::put('/post_img/{post_img:id}', [PostController::class, 'updateImg'])->name("updateImg");
        Route::delete('/post_img/{post_img:id}', [PostController::class, 'delImg'])->name("delImg");
    });
});

Route::prefix("administration")->name("admin.")->group(function () {
    Route::get('/login', [AdminAuthController::class, "loginPage"])->name("login.page")->middleware("guest");
    Route::post('/login', [AdminAuthController::class, "login"])->name("login")->middleware("guest");
    Route::get('/logout', [AdminAuthController::class, "logout"])->name("logout")->middleware("auth:admin");

    Route::middleware("auth:admin")->group(function () {
        Route::get('/settings', function () {
            return view('admin/settings');
        })->name("settings");

        Route::get('/ourWorks', function () {
            return view('admin/ourWorks');
        })->name("ourWorks");

        Route::get('/services', function () {
            return view('admin/services');
        })->name("services");

        Route::get('/blog', function () {
            $paginate = Post::query()->orderByDesc("updated_at")->paginate(12, ['*'], "p")
                ->withPath(route('admin.blog'));
            return view('admin/blog', compact("paginate"));
        })->name("blog");

        Route::get('/blog-images/{post:id}', function (Post $post) {
            return view('admin/blog-images', compact('post'));
        })->name("blog-images");
    });
});
