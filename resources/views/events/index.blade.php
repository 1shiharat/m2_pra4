<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>イベント一覧</title>
</head>
<body>
    <h1>イベント一覧</h1>
    <a href="{{ route('events.create') }}">新規イベント登録</a>
    <table>
        <thead>
            <tr>
                <th>イベント名</th>
                <th>開催場所</th>
                <th>開催日</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->location }}</td>
                    <td>{{ $event->date }}</td>
                    <td>
                        <a href="{{ route('events.edit', $event->id) }}">編集</a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
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
