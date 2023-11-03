<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [RegisterController::class, 'show']);

Route::get('/blog', function () {
    return view('blog');
});



Route::get('/about', [TestController::class, 'showAboutPage'])->name('about');
Route::get("/about/{name}", [TestController::class, 'showAboutDetails']);
Route::post("/register", [UserController::class, 'register']);
Route::post("/create-blog", [UserController::class, 'createBlogArticle']);


Route::resource("user", AuthController::class);