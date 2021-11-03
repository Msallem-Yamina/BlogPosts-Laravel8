<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function AddComment(Request $request){
        $comment = new Comment();
        $comment->createur_id  = Auth::user()->id;
        $comment->post_id = $request->post_id;
        $comment->content = $request->content;
        $comment->save();
        return redirect()->back(); 

    }
    public function touscomments(){
        
        $c= Comment::orderBy('created_at','desc')->paginate(4);
       
        if (Auth::user()->role =='client') {
            return view('Client.Comments');
        }else{
            return view('Admin.comments')->with('comments',$c);
        }
    }
}
