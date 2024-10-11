<?php

use Illuminate\Http\Request;
use App\Models\Dispatch;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::get('/events', function(Request $request){
    $workerId = $request->query('worker_id');
        
    $dispatches = Dispatch::with('event') // イベント情報を取得
                        ->where('worker_id', $workerId)
                        ->get();

    return response()->json([
        'status' => 'success',
        'data' => $dispatches
    ]);
});