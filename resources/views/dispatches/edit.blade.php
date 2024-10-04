<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>派遣情報編集</title>
</head>
<body>
    <h1>派遣情報編集</h1>
    <form method="POST" action="{{ route('dispatches.update', $dispatch->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="event_id">イベント</label>
            <select id="event_id" name="event_id" required>
                @foreach ($events as $event)
                    <option value="{{ $event->id }}" {{ $event->id == $dispatch->event_id ? 'selected' : '' }}>
                        {{ $event->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="worker_id">人材</label>
            <select id="worker_id" name="worker_id" required>
                @foreach ($workers as $worker)
                    <option value="{{ $worker->id }}" {{ $worker->id == $dispatch->worker_id ? 'selected' : '' }}>
                        {{ $worker->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="accepted">承諾状況</label>
            <select id="accepted" name="accepted">
                <option value="1" {{ $dispatch->accepted ? 'selected' : '' }}>承諾</option>
                <option value="0" {{ !$dispatch->accepted ? 'selected' : '' }}>未承諾</option>
            </select>
        </div>
        <button type="submit">更新</button>
    </form>
    <a href="{{ url()->previous() }}">前の画面に戻る</a>
</body>
</html>
