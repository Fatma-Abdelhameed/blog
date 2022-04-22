@extends('layout.app')
@section('content')
@if (session('status'))
    <div class="alert alert-success text-center">
        {{ session('status') }}
    </div>
@endif
<div class="header text-center">
            <a class="btn btn-success" href="{{ route('posts.create') }}"><i class="fa-solid fa-plus me-2 fw-bold"></i>Create New One</a>
        </div>
        <table class="table mt-3 posts">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Posted By</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)

                    <tr class="bg-white border-white">
                        <th scope="row">{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        @if ($post->user)
                            <td>{{$post->user->name}}</td>
                        @else
                            <td>__</td>
                        @endif
                        <td>{{ \Carbon\Carbon::parse($post->created_at)->toDateString() }}</td>
                        <td>
                        <a href="{{ route('posts.view', ['post' => $post->id]) }}" class="text-info me-2 fs-5" title="View"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="text-primary me-2 fs-5" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="#" class="text-danger fs-5" title="Delete"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center">
            <span>{{$posts->links()}}</span>
        </div>
@endsection