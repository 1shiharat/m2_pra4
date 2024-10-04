<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規イベント登録</title>
</head>
<body>
    <h1>新規イベント登録</h1>
    <form method="POST" action="{{ route('events.store') }}">
        @csrf
        <div>
            <label for="name">イベント名</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="location">開催場所</label>
            <input type="text" id="location" name="location" required>
        </div>
        <div>
            <label for="date">開催日</label>
            <input type="date" id="date" name="date" required>
        </div>
        <button type="submit">登録</button>
    </form>
    <a href="{{ url()->previous() }}">前の画面に戻る</a>
</body>
</html>
