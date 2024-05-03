<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
/* 외부 API인 JSONPlaceholder를 사용하여 CRUD(Create, Read, Update, Delete) 작업을 수행하는 실습 
컨트롤러를 통해 CRUD 작업을 제어할 수 있습니다.
*/
class clientController extends Controller
{
    public function getAllPost() : array
    {
       
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        return $response->json();
    }

    public function getPostById($id) : array
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts/'.$id);
        return $response->json();
    }
    public function addPost() : array
    {
        $post = Http::post('https://jsonplaceholder.typicode.com/posts', 
        [
            'userId' => 1,
            'title' => 'New Post Title',
            'body' => 'New Post Description'
        ]);
        return $post->json();
    }
    public function updatePost() : array
    {
        $response = Http::put('https://jsonplaceholder.typicode.com/posts/1', 
        [
            'title' => 'Updated Title',
            'body' => 'Updated Description'
        ]);
        return $response->json();
    }
    public function deletePost($id) : array
    {
        $response = Http::delete('https://jsonplaceholder.typicode.com/posts/'.$id);
        return $response->json();
    }
}
