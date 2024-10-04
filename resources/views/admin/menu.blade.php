<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>管理メニュー</h1>
    <ul>
        <li><a href="{{ route('events.index') }}">イベント管理</a></li>
        <li><a href="{{ route('workers.index') }}">人材管理</a></li>
        <li><a href="{{ route('dispatches.index') }}">派遣情報管理</a></li>
    </ul>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">ログアウト</button>
    </form>
</body>
</html>