<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시글 보기</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="text-center">
            <div class="mb-4">
                <h2 class="display-4">게시글 보기</h2>
            </div>
            <div class="mb-3">
                <h3 class="mb-2">{{$post->subject}}</h3>
                <p>{{$post->content}}</p>
            </div>
            <div class="mb-3">
                <a href="{{route('posts.getallpost')}}" class="btn btn-primary">목록</a>
            </div>
        </div>
    </div>
</body>
</html>
