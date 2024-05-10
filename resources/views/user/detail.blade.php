<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Detail</title>
</head>
<body>
    {{-- Blade의 변수 출력 구문 --}}
    {{-- http://127.0.0.1:8000/user/view/1
        http://127.0.0.1:8000/user/response/1--}}
    <h1>User Detail Page</h1>
    <p>User ID: {{ $userId }}</p>
</body>
</html>
