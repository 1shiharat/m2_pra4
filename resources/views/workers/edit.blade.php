<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>人材編集</title>
</head>
<body>
    <h1>人材編集</h1>
    <form method="POST" action="{{ route('workers.update', $worker->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="name">名前</label>
            <input type="text" id="name" name="name" value="{{ $worker->name }}" required>
        </div>
        <div>
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" value="{{ $worker->email }}" required>
        </div>
        <div>
            <label for="password">パスワード（変更する場合のみ入力）</label>
            <input type="password" id="password" name="password">
        </div>
        <div>
            <label for="password_confirmation">パスワード確認（変更する場合のみ入力）</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>
        <button type="submit">更新</button>
    </form>

    <a href="{{ url()->previous() }}">前の画面に戻る</a>
</body>
</html>
