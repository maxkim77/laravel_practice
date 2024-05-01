<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostController extends Controller
{
    // 이 아래에 코드를 입력하시기 바랍니다.
    // 

    public function getAllPost()
    {
        $posts = DB::table('posts')->get();
        return view('posts', compact('posts'));
    }

    public function getAllPostUsingModel()
    {
        $posts = Post::all();
        // return $posts;
        return view('all-view', compact('posts'));
    }

}
