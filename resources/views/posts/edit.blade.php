@extends('layout.app')
@section('content')
        <form method="POST" action="{{ route('posts.update',['post'=>$post['id']])}}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input name="post-title" type="text" class="form-control" id="exampleInputEmail1" value="{{$post->title}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Description</label>
                <textarea name="post-description" class="form-control" id="exampleInputPassword1">{{$post->description}}</textarea>
            </div>
            <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Post Creator</label>
                <select name="post-creator" class="form-select" aria-label="Default select example">
                    @foreach($users as $user)
                        @if($user->id == $post->user->id)
                            <option value="{{$post->user->id}}" selected>{{$post->user->name}}</option>
                        @else
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection