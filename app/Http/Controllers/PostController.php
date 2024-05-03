<?php
// PHP 코드는 HTML 코드의 뒤에 위치합니다.
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostController extends Controller
{
    public function getAllPost()
    {
        $posts = DB::table('posts')->get();
        return view('posts', compact('posts'));
    }

    public function addPost()
    { 
        return view('add-post');
    }

    public function addPostSubmit(Request $request)
    {
        DB::table('posts')->insert([
            'subject' => $request->subject,
            'content' => $request->content,
        ]);

        return back()->with('post_created', 'Post has been created successfully!');
    }

    public function getAllPostUsingModel()
    {
        $posts = Post::all();
        return view('all-view', compact('posts'));
    }
}
?>