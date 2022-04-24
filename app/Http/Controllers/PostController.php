<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
use App\Models\CommentController;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
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
    public function store(StorePostRequest $request)
    {
    
        $post_data = request()->all();
        $imagePath = Storage::putFile('avatars', $request->file('avatar'));
        Post::create([
            'image'=>$imagePath,
            'title'=>$post_data['post-title'],
            'description'=>$post_data['post-description'],
            'user_id'=>$post_data['post-creator'],
            'slug'=>Str::slug($request->input('post-title'))
        ]);
        //dd($post->image);
        //return redirect('/posts');
       return redirect('/posts')->with('status', 'Post is inserted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($postSlug)
    {
        $postId = Post::where('slug',$postSlug)->get()->toArray()[0]['id'];
        $postInfo = Post::find($postId);
        $users = User::all();
        return view('posts.view', [
            'post' => $postInfo,
            'users' => $users
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
        $users = User::all();
        return view('posts.edit', [
            'post' => $postInfo,
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
    public function update(StorePostRequest $request, $postId)
    {
        $postInfo = request()->all();
        Post::where('id', $postId)->update([
            'title'=>$postInfo['post-title'],
            'description'=>$postInfo['post-description'],
            'user_id'=>$postInfo['post-creator'],
            'slug'=>Str::slug($request->input('post-title'))
        ]);
        return redirect('/posts')->with('status', 'Post is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($postId)
    {
        $post = Post::find($postId);
        $post->delete();
        return redirect('/posts')->with('status', 'Post is deleted successfully');
    }
}
