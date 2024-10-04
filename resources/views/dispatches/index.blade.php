<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>派遣情報一覧</title>
</head>
<body>
    <h1>派遣情報一覧</h1>
    <a href="{{ route('dispatches.create') }}">新規派遣登録</a>
    <table>
        <thead>
            <tr>
                <th>イベント名</th>
                <th>人材名</th>
                <th>承諾状況</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dispatches as $dispatch)
                <tr>
                    <td>{{ $dispatch->event->name }}</td>
                    <td>{{ $dispatch->worker->name }}</td>
                    <td>{{ $dispatch->accepted ? '承諾' : '未承諾' }}</td>
                    <td>
                        <a href="{{ route('dispatches.edit', $dispatch->id) }}">編集</a>
                        <form action="{{ route('dispatches.destroy', $dispatch->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('home') }}">管理画面に戻る</a>
</body>
</html>
