<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container w-50">
        @if(Session::has('post_created'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('post_created') }}
        </div>
        @endif    
        <form action="{{ route('post.add') }}" method="post">
            @csrf <!-- 라라벨의 CSRF 보호를 위해 추가 -->
            <span class="h2">게시판</span>
            <div class="mb-2">
                <input type="text" name="subject" class="form-control" placeholder="제목을 입력해주세요">
            </div>
            <div>
                <textarea name="content" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="mt-2">
                <button class="btn btn-primary">등록</button>
                <a href ="{{ route('posts.getallpost') }}" class="btn btn-primary">목록</a>

            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>