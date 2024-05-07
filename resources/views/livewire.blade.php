<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- vite: html을 css js와 연결할때 사용함 -->
        @vite('resources/css/app.css', 'resources/js/app.js')
        <!-- 완전한 작동을 위해 필수적으로 추가해야하는 코드 -->
        @livewireStyles
    </head>
    <body>        
        <!-- component를 호출하기 위해 사용함 -->
        <livewire:livewire/> 
        <!-- 필수 동작요소 -->
        @livewireScripts
    </body>
</html>
 