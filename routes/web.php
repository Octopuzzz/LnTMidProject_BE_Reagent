<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;


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
    return view('Components/Home', [
        'title' => 'Home',
        'name' => 'Marci',
        'email' => 'Sun-Bean@gmail.com',
        'image' => 'Marcy.png'
    ]);
});
Route::get('/about', function () {
    return view('Components/about', [
        'title' => 'About',
        'Title' => 'The Life Of Marci',
        'Body' => "Marci was mirana's best friend",
        'image' => 'Marcy.png'
    ]);
});
Route::get('/blog', [PostController::class, 'index']);
Route::get('/Post/{post:slug}', [PostController::class, 'show']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logouts']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');;
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');
Route::get('/dashboard/posts/checkslug', [DashboardPostController::class, 'checkslug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::post('/register', [RegisterController::class, 'store']);
