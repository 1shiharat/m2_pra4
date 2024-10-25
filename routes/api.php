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

// イベント情報取得API (worker_idに基づく基本的なイベント取得 + 絞り込み機能)
Route::get('/events', function(Request $request){
    // クエリパラメータからworker_idを取得
    $workerId = $request->query('worker_id');
    
    // worker_idが存在しない場合、エラーを返す
    if (!$workerId) {
        return response()->json(['error' => 'worker_id is required'], 404);
    }

    // Dispatchテーブルからworker_idに基づくデータを取得し、イベント情報を紐付ける
    $query = Dispatch::with('event')
                     ->where('worker_id', $workerId);

    // 日付による絞り込み (クエリパラメータで指定されていれば)
    if ($request->query('date')) {
        $query->whereHas('event', function($q) use ($request) {
            $q->where('date', $request->query('date'));
        });
    }

    // 場所による絞り込み (クエリパラメータで指定されていれば)
    if ($request->query('place')) {
        $query->whereHas('event', function($q) use ($request) {
            $q->where('location', 'like', '%' . $request->query('place') . '%');
        });
    }

    // タイトルによる絞り込み (クエリパラメータで指定されていれば)
    if ($request->query('title')) {
        $query->whereHas('event', function($q) use ($request) {
            $q->where('name', 'like', '%' . $request->query('title') . '%');
        });
    }

    // 最終的な結果を取得
    $dispatches = $query->get();

    // 結果が空の場合、エラーを返す
    if ($dispatches->isEmpty()) {
        return response()->json(['error' => 'No events found'], 404);
    }

    // 成功した場合、データを返す
    return response()->json([
        'status' => 'success',
        'data' => $dispatches
    ]);
});

// イベント参加承諾API (worker_idとevent_idに基づいて参加を承諾)
Route::post('/events', function(Request $request){
    // リクエストから必要なパラメータを取得
    $eventId = $request->input('event_id');
    $workerId = $request->input('worker_id');

    // event_id と worker_id が必須
    if (!$eventId || !$workerId) {
        return response()->json(['error' => 'event_id and worker_id are required'], 404);
    }

    // Dispatchデータの検索
    $dispatch = Dispatch::where('event_id', $eventId)
                        ->where('worker_id', $workerId)
                        ->first();

    // 該当するデータが存在しない場合はエラーレスポンス
    if (!$dispatch) {
        return response()->json(['error' => 'Dispatch not found'], 404);
    }

    // accepted フラグを true に更新
    $dispatch->accepted = true;
    $dispatch->save();

    // 成功した場合は204 (No Content) ステータスを返す
    return response()->json(['message' => 'Event accepted'], 204);
});

