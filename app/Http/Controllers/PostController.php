<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
//use Carbon\Carbon;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$posts = Post::all();
        $posts = Post::paginate(5);
        
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('posts.create', [
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post_data = request()->all();
        Post::create([
            'title'=>$post_data['post-title'],
            'description'=>$post_data['post-description'],
            'user_id'=>$post_data['post-creator']
        ]);
        //return redirect('/posts');
       return redirect('/posts')->with('status', 'Post is inserted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($postId)
    {
        $postInfo = Post::find($postId);
        $userInfo = User::find($postInfo->user_id);
        return view('posts.view', [
            'post' => $postInfo,
            'creator'=> $userInfo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($postId)
    {
        $postInfo = Post::find($postId);
        $userInfo = User::find($postInfo->user_id);
        $users = User::all();
        return view('posts.edit', [
            'post' => $postInfo,
            'creator'=> $userInfo,
            'users'=>$users
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
