<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;

class commentController extends Controller
{
    public function store(Request $request, $id){
    	
    	$this->validate($request,[
    		'comment' => 'required',
    	]);

    	$comment = new Comment;

    	$comment->user_id = Auth::user()->id;
    	$comment->post_id = $id;
    	$comment->body = $request->comment;

    	$comment->save();

    	return redirect("post/$id");
    }

    public function delete($id){
    	$comment = Comment::find($id);
    	$post_id = $comment->post_id;
    	$comment->delete();
    	return redirect("/post/$post_id");
    }
}
