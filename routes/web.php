<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\DispatchController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------|
| Web Routes                                                               |
|--------------------------------------------------------------------------|
| Here is where you can register web routes for your application. These    |
| routes are loaded by the RouteServiceProvider within a group which       |
| contains the "web" middleware group. Now create something great!         |
|--------------------------------------------------------------------------|
*/

// デフォルトルート: ログイン画面にリダイレクト
Route::get('/', function () {
    return redirect('/login');
});

// ログインページのルート
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// ログイン処理
Route::post('/login', [AuthController::class, 'login']);

// ログアウト処理
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 認証が必要なルート
Route::middleware(['auth:sanctum'])->group(function () {

    // ダッシュボード（ホーム画面）
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // イベント(CRUD)
    Route::resource('events', EventController::class);

    // 人材管理
    Route::resource('workers', WorkerController::class);

    // 派遣情報管理
    Route::resource('dispatches', DispatchController::class);
});