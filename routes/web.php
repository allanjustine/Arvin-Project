<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
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

Route::get('/', [AuthController::class, 'loginForm'])->name('login');
Route::post('/', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerForm']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/verification/{user}/{token}', [AuthController::class,'verification']);
Route::get('logout', [AuthController::class, 'logout']);

Route::group(['middleware' => ['auth', 'role:writer']], function () {
    Route::get('/dashboard', function() {
        return view('/dashboard');
    });

});
Route::group(['middleware' => 'auth'], function () {

    Route::get('/myPost', [PostController::class, 'index']);
    Route::get('/create', [PostController::class, 'create']);
    Route::get('/editPost/{myPost}', [PostController::class, 'edit']);
    Route::get('/deletePost/{myPost}', [PostController::class, 'destroy']);
    Route::get('/editRecentPost/{recentPost}', [PostController::class, 'edit2']);
    Route::get('/deleteRecentPost/{recentPost}', [PostController::class, 'destroy2']);

    Route::get('/recentPost', [PostController::class, 'index2']);

});

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/logs',[SiteController::class, 'index']);
    Route::get('/logs',[SiteController::class, 'logs'])->name('logs');

    Route::get('/create-user', [UserController::class, 'createUser']);
    Route::get('/editUser/{user}', [UserController::class, 'edit']);
    Route::get('/deleteUser/{user}', [UserController::class, 'destroy']);

});

Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function() {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/users', UserController::class);
});
