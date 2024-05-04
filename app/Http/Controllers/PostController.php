<?php
// PHP 코드는 HTML 코드의 뒤에 위치합니다.
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostController extends Controller
{
    public function getAllPostUsingQuery()
    {
        $posts = DB::table('posts')->get();
        return view('all-view', compact('posts'));
        //compact 함수는 변수명과 변수값이 동일한 연관 배열을 생성
    }

    // 위에서 controller에서 쿼리빌더를 통해 데이터를 가져오는 방법을 썼다면 밑에서는 모델을 통해 데이터를 가져오는 방법을 사용한다.
    public function getAllPostUsingModel()
    {
        $posts = Post::all();
        return view('posts', compact('posts'));
    }


    public function addPost()
    { 

        return view('add-post');
    }

    public function addPostSubmit(Request $request)
    {
        // DB::table('posts')->insert([
        //     'subject' => $request->subject,
        //     'content' => $request->content,
        // ]);
        $post = new Post; // Post 모델을 사용하기 위해 인스턴스 생성
        $post->subject = $request->subject; // subject 컬럼에 입력값 대입
        $post->content = $request->content;
        $post->save(); 
        return back()->with('post_created', 'Post has been created successfully!');
    }


    public function getPostById($id)
    {
        // $post = DB::table('posts')->where('id', $id)->first();
        $post = Post::find($id);
        return view('single-post', compact('post'));
    }

    public function editPost($id)
    {
        //$post = DB::table('posts')->where('id', $id)->first();
        $post = Post::find($id);
        return view('edit-post', compact('post'));
    }

    public function updatePost(Request $request)
    {
        // DB::table('posts')->where('id', $request->id)->update([
        //     'subject' => $request->subject,
        //     'content' => $request->content,
        // ]);

        $post = Post::find($request->id); ///request로 받은 id값을 가진 데이터를 찾아서 수정
        $post->subject = $request->subject;
        $post->content = $request->content;
        $post->save();

        return back()->with('post_updated', 'Post has been updated successfully!');
    }

    public function deletePost($id)
    {
        // DB::table('posts')->where('id', $id)->delete();
        $post = Post::find($id);
        if ($post === null) {
            return back()->with('error', 'Post not found.');
        }
    
        $post->delete();
        return back()->with('post_deleted', 'Post has been deleted successfully!');
    }    // with 함수는 세션에 데이터를 저장하는데 사용: 키값은 템플릿에서 불러올때 사용 하며, 값은 저장할 데이터 혹은 메시지를 의미
    // public function innerJoinClause()
    // {
    //     $posts = DB::table('users')
    //         ->select('posts.id','users.name', 'posts.subject', 'posts.content','users.email')
    //         ->join('posts', 'users.id', '=', 'posts.user_id')
    //         ->get();
    
    //     return view('join-view', compact('posts'));
    // }
   
}
?>