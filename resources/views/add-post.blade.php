<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시글 등록</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="w-50">
            @if(Session::has('post_created'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('post_created') }}
            </div>
            @endif    
            <form action="{{ route('post.add') }}" method="post">
                @csrf <!-- 라라벨의 CSRF 보호를 위해 추가 -->
                <div class="mb-4 text-center">
                    <h2>게시글 등록</h2>
                </div>
                <div class="mb-2">
                    <input type="text" name="subject" class="form-control" placeholder="제목을 입력해주세요">
                </div>
                <div class="mb-3">
                    <textarea name="content" cols="30" rows="10" class="form-control" placeholder="내용을 입력해주세요"></textarea>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary me-2">등록</button>
                    <a href ="{{ route('posts.getallpost') }}" class="btn btn-secondary">목록</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
