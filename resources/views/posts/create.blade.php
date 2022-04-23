@extends('layouts.app')
@section('content')
    <form method="POST" action="{{route('posts.store')}}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="post-title">
                @error('post-title')
                <div class="alert text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Description</label>
                <textarea class="form-control" id="exampleInputPassword1" name="post-description"></textarea>
                @error('post-description')
                <div class="alert text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Post Creator</label>
                <select class="form-select" aria-label="Default select example" name="post-creator">
                    @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                @error('post-creator')
                <div class="alert text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Create</button>
    </form>
@endsection