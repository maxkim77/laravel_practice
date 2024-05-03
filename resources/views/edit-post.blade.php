<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container w-50 mt-5">
        @if(Session::has('post_updated'))
        <div class="alert alert-success" role="alert">
            {{Session::get('post_updated')}}
            </div>
        @endif
        <form method="POST" autocomplete="off" action="{{route('post.update')}}">
            @csrf
        <input type="hidden" name="id" value="{{ $post->id }}">
        <div class="mt-4 mb-3">
            <span class="h2">게시판/ 글수정</span>
        </div>
        <div class="mb-2">
            <input type="text" name="subject" value="{{$post->subject}}" class="form-control">
        </div>
        <div>
            <textarea name="content" id="" cols="30" rows="10" class="form-control">{{$post->content}}</textarea>
        </div>
        <div class="mt-2">
            <button class="btn btn-primary">확인</button>
            <a href="{{route('posts.getallpost')}}" class="btn btn-secondary">목록</a>
        </div>
        </form>
    </div>
</body>
</html>