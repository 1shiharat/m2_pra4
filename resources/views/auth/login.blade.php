<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
</head>
<body>
    <h1>ログイン</h1>
    <form method="POST" action="<?php echo route('login'); ?>">
        @csrf
        <div>
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">パスワード</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">ログイン</button>
    </form>
</body>
</html>