<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::with('user')->get();
        return PostResource::collection($post);
    }
    public function show($postId)
    {
        $post = Post::find($postId);
        return new PostResource($post);
    
    }
    public function store(StorePostRequest $request)
    {
        $post_data = request()->all();
        $post = Post::create([
            'title'=>$post_data['post-title'],
            'description'=>$post_data['post-description'],
            'user_id'=>$post_data['post-creator'],
        ]);
        return new PostResource($post);
    }
}
