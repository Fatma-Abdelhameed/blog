<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
class PostController extends Controller
{
    public function index()
    {

        return Post::all();
    }
    public function show($postId)
    {
        return Post::find($postId);
    
    }
    public function store(StorePostRequest $request)
    {
        $post_data = request()->all();
        $post = Post::create([
            'title'=>$post_data['post-title'],
            'description'=>$post_data['post-description'],
            'user_id'=>$post_data['post-creator'],
        ]);
        return $post;
    }
}
