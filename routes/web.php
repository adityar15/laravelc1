<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
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
Route::post("/register", [UserController::class, 'register']);



// Route::get('/login', [RegisterController::class, 'showLoginPage']);
// provided you just want to show the login page (or any page) and do not want to run additional logic like db queries, etc
Route::inertia('/login', 'Login');

Route::post("/login", [UserController::class, 'login']);


Route::inertia('/dashboard', 'Dashboard');



Route::get('/blogs', [BlogController::class, 'show']);

Route::post('/blog', [BlogController::class, 'createArticle']);
Route::get("/blog/{slug}", [BlogController::class, 'showArticle']);


Route::get('/about', [TestController::class, 'showAboutPage'])->name('about');
Route::get("/about/{name}", [TestController::class, 'showAboutDetails']);
Route::post("/create-blog", [UserController::class, 'createBlogArticle']);


Route::resource("user", AuthController::class);