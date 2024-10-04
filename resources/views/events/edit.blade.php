<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>イベント編集</title>
</head>
<body>
    <h1>イベント編集</h1>
    <form method="POST" action="{{ route('events.update', $event->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="name">イベント名</label>
            <input type="text" id="name" name="name" value="{{ $event->name }}" required>
        </div>
        <div>
            <label for="location">開催場所</label>
            <input type="text" id="location" name="location" value="{{ $event->location }}" required>
        </div>
        <div>
            <label for="date">開催日</label>
            <input type="date" id="date" name="date" value="{{ $event->date }}" required>
        </div>
        <button type="submit">更新</button>
    </form>
    <a href="{{ url()->previous() }}">前の画面に戻る</a>
</body>
</html>
