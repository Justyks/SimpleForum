<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function showAll(Request $request, int $categoryId=null)
    {
        if($categoryId)
        {
            $posts=Category::find($categoryId)->posts()->orderBy('updated_at','desc')->simplePaginate(2);
        }
        if($request->has('title') && $request->has('text'))
        {
            $newPost= new Post();
            $newPost->title=$request->input('title');
            $newPost->text=$request->input('text');
            $newPost->user_id=Auth::id();
            $newPost->category_id=$categoryId;
            $newPost->created_at=date('Y-m-d H:i:s');
            $newPost->updated_at=date('Y-m-d H:i:s');
            $newPost->save();
            return back();
        }
        return view('dashboard',[
            'posts'=>$posts
        ]);
    }

    public function showPost(Request $request,int $categoryId = null, int $postId = null)
    {
        if($categoryId && $postId)
        {
            $post=Post::find($postId);
            $comments=$post->comments()->orderBy('created_at','asc')->get();
        }
        if($request->has('comment'))
        {
            $newComment= new Comment();
            $newComment->text=$request->input('comment');
            $newComment->post_id=$post->id;
            $newComment->user_id=Auth::id();
            $newComment->created_at=date('Y-m-d H:i:s');
            $newComment->updated_at=date('Y-m-d H:i:s');
            $newComment->save();
            return redirect()->action([PostController::class,'showPost'],['categoryId'=>$categoryId,'postId'=>$postId]);
        }

        return view('post.showPost',[
            'post'=>$post,
            'comments'=>$comments
        ]);
    }

    public function delete(int $categoryId, int $postId, int $commentId)
    {
        Comment::find($commentId)->delete();
        return back();

    }
}
