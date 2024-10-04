<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規人材登録</title>
</head>
<body>
    <h1>新規人材登録</h1>
    <form method="POST" action="{{ route('workers.store') }}">
        @csrf
        <div>
            <label for="name">名前</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">パスワード</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="password_confirmation">パスワード確認</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>
        <button type="submit">登録</button>
    </form>

    <a href="{{ url()->previous() }}">前の画面に戻る</a>
</body>
</html>
