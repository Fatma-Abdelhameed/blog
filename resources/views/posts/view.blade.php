@extends('layout.app')
@section('content')
        <div class="card post-info">
            <div class="card-header bg-primary text-white">
                Post Info
            </div>
            <div class="card-body">
                <div class="post_title">
                    <div class="row post-title">
                        <h5 class="col-1">Title</h5>
                        <p class="col-11">{{$post->title}}</p>
                    </div>
                    <div class="row post-description">
                        <h5>Description</h5>
                        <p>{{$post->description}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card creator-info mt-4">
            <div class="card-header bg-primary text-white">
                Post Creator Info
            </div>
            <div class="card-body">
                <div class="creator_title">
                    <div class="row creator-name">
                        <h5 class="col-2">Name</h5>
                        <p class="col-10">{{$post->user->name}}</p>
                    </div>
                    <div class="row creator-email">
                        <h5 class="col-2">Email</h5>
                        <p class="col-10">{{$post->user->email}}</p>
                    </div>
                    <div class="row creator-date">
                        <h5 class="col-2">Created At</h5>
                        <p class="col-10">{{ \Carbon\Carbon::parse($post->user->created_at)->toDayDateTimeString() }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-4">
        <div class="card-header bg-primary text-white">
            Comments
        </div>
        <div class="card-body">
            <form action="{{route('posts.comments.store', ['post' => $post['id'], 'type' => get_class($post)])}}" method="POST">
                @csrf
                <div class="form-group">
                    <textarea name="body" id="body" cols="15" rows="4" class="form-control" placeholder="Your comment here"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">User</label>
                    <select name="user_id" class="form-control">
                        @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary mt-3">Add Comment</button>
                </div>
            </form>
        </div>
    </div>
    <div class="mt-4"><h2>Comments</h2></div>
        @foreach($post->comments as $comment)
            <div class="card mt-4 mb-4">
                <div class="card-header">
                    <span>{{$comment->user->name}}</span>
                    <form class="delete-form" method="POST" action="{{route('posts.comments.destroy',['comment'=>$comment['id']])}}">
                            @csrf
                            @method('delete')
                            <button class="btn btn-default text-danger" title="Delete" type="submit" onclick="return confirm('you are about to delete this comment \nif you are sure press ok')"><i class="fa-solid fa-trash-can fs-5"></i></button>
                        </form> 
                </div>
                <div class="card-body">
                    <div>
                        <span style="font-size: 1.2rem; font-weight: bold">Comment: </span>
                        {{$comment->body}}
                    </div>
                    <div>
                        <span style="font-size: 1rem; font-weight: bold">Created At: </span>
                        {{ \Carbon\Carbon::parse($post->user->created_at)->toDayDateTimeString() }}
                    </div>
                </div>
            </div>
        @endforeach
@endsection

