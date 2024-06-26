<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="w-50">
            @if(Session::has('post_deleted'))
            <div class="alert alert-success" role="alert">{{ Session::get('post_deleted') }}</div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>제목</th>
                        <th>내용</th>
                        <th>처리</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->subject }}</td>
                        <td>{{ $post->content }}</td>
                        <td>
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning">수정</a>
                            <a href="{{ route('post.getbyid', $post->id) }}" class="btn btn-primary">보기</a>
                            <a href="{{ route('post.delete', $post->id) }}" class="btn btn-danger">삭제</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('post.add') }}" class="btn btn-primary">글쓰기</a>
        </div>
    </div>
</body>
</html>
