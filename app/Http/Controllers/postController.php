<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Post;
use App\User;
use App\Comment;
use Auth;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$post = new Post;
    	$posts = $post::WHERE('user_id',Auth::User()->id)->get();

    	$person = new User;
    	$user = $person::find(Auth::User()->id)->name;

    	$selectMenu = "All";
        return view('posts.usersAllPost', compact(['posts','user','selectMenu']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.createPost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	
        $this->validate($request,[
        	'postHeading' => 'required|string|max:255',
        	'postBody' => 'required',
        ]);

        $post = new Post;
        $user = new User;

        $post->user_id = Auth::User()->id;
        $post->heading = $request->input('postHeading');
        $post->catagory = $request->input('postCatagory');
        $post->status = $request->input('post-type');
        $post->body = $request->input('postBody');
        
        $post->save();

        return redirect('/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
    	$person = new User;
    	$user = $person::find(Auth::User()->id)->name;

        $id = $post->id;
        $comments = Comment::where('post_id',$id)->get();
        // return $comments;
        return view('posts.singlePost' , compact(['post','user','comments']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.editPost', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
        	'postHeading' => 'required|string|max:255',
        	'postBody' => 'required',
        ]);

        $postTable = new Post;
        $user = new User;

        $post = $postTable::find($id);

        $post->user_id = Auth::User()->id;
        $post->heading = $request->input('postHeading');
        $post->catagory = $request->input('postCatagory');
        $post->status = $request->input('post-type');
        $post->body = $request->input('postBody');
        
        $post->save();

        return redirect('/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    	$postTable = new Post;

    	$post = $postTable::find($id);
    	$post->delete();
        return redirect('/post');
    }

    public function published(){

		$post = new Post;
		$posts = $post::WHERE('user_id',Auth::User()->id)->WHERE('status','publish')->get();
		

		$person = new User;
		$user = $person::find(Auth::User()->id)->name;

		$selectMenu = "published";
	    return view('posts.usersAllPost', compact(['posts','user','selectMenu']));

    }


    public function drafted(){

		$post = new Post;
		$posts = $post::WHERE('user_id',Auth::User()->id)->WHERE('status','draft')->get();
		

		$person = new User;
		$user = $person::find(Auth::User()->id)->name;

		$selectMenu = "drafted";
	    return view('posts.usersAllPost', compact(['posts','user','selectMenu']));

    }


    public function personal(){

		$post = new Post;
		$posts = $post::WHERE('user_id',Auth::User()->id)->WHERE('status','personal')->get();
		

		$person = new User;
		$user = $person::find(Auth::User()->id)->name;

		$selectMenu = "personal";
	    return view('posts.usersAllPost', compact(['posts','user','selectMenu']));

    }
}
