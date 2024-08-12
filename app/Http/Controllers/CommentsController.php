<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    //
    public function store(Post $post){
        request()->validate([
            'content'=>'required'
            ]);
        $comment=new Comment();
        $comment->content=request()->get('content');
        $comment->user_id=Auth::user()->id;
        $comment->post_id=$post->id;
        $comment->save();
        return redirect()->back()->with('message','Comment Posted Successfully');
    }
    public function destroy(Comment $comment){
        //Comment::where('id',$comment->id)->delete();
        //return redirect()->back()->with('message','Comment Deleted Successfully');
    }
}
