<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="continer w-50 mt-5">
        <div class="mt-4 mb-3">
            <span class="h2">게시판</span>
        </div>
        <div class="mb-2">
            {{$post->subject}}
        </div>
        <div class="mb-2">
            {{$post->content}}
        </div>
        <div class="mb-2">
            <a href="{{route('posts.getallpost')}}" class="btn btn-primary">목록</a>
         </div>
    </div>
</body>
</html>