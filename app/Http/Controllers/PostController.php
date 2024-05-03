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


    public function getPostById($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        return view('single-post', compact('post'));
    }

    public function editPost($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        return view('edit-post', compact('post'));
    }

    public function updatePost(Request $request)
    {
        DB::table('posts')->where('id', $request->id)->update([
            'subject' => $request->subject,
            'content' => $request->content,
        ]);

        return back()->with('post_updated', 'Post has been updated successfully!');
    }

    public function deletePost($id)
    {
        DB::table('posts')->where('id', $id)->delete();
        return back()->with('post_deleted', 'Post has been deleted successfully!');
    }    
    public function innerJoinClause()
    {
        $posts = DB::table('users')
            ->select('posts.id','users.name', 'posts.subject', 'posts.content','users.email')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->get();
    
        return view('join-view', compact('posts'));
    }
    // 위에서 controller에서 쿼리빌더를 통해 데이터를 가져오는 방법을 썼다면 밑에서는 모델을 통해 데이터를 가져오는 방법을 사용한다.
    public function getAllPostUsingModel()
    {
        $posts = Post::all();
        return view('all-view', compact('posts'));
    }
    
}
?>