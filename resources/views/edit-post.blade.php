<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글 수정</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="w-50">
            @if(Session::has('post_updated'))
            <div class="alert alert-success" role="alert">
                {{Session::get('post_updated')}}
            </div>
            @endif
            <form method="POST" autocomplete="off" action="{{route('post.update')}}">
                @csrf
                <input type="hidden" name="id" value="{{ $post->id }}">
                <div class="mt-4 mb-3">
                    <h2 class="h2">게시판/ 글수정</h2>
                </div>
                <div class="mb-3">
                    <input type="text" name="subject" value="{{$post->subject}}" class="form-control">
                </div>
                <div class="mb-3">
                    <textarea name="content" id="" cols="30" rows="10" class="form-control">{{$post->content}}</textarea>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary me-2">확인</button>
                    <a href="{{route('posts.getallpost')}}" class="btn btn-secondary">목록</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
