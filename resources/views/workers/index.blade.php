<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>人材一覧</title>
</head>
<body>
    <h1>人材一覧</h1>
    <a href="{{ route('workers.create') }}">新規人材登録</a>
    <table>
        <thead>
            <tr>
                <th>名前</th>
                <th>メールアドレス</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($workers as $worker)
                <tr>
                    <td>{{ $worker->name }}</td>
                    <td>{{ $worker->email }}</td>
                    <td>
                        <a href="{{ route('workers.edit', $worker->id) }}">編集</a>
                        <form action="{{ route('workers.destroy', $worker->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- 管理画面に戻るボタン -->
    <br>
    <a href="{{ route('home') }}">管理画面に戻る</a>
</body>
</html>
