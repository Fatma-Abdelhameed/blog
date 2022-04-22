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
                        <p class="col-10">{{$creator->name}}</p>
                    </div>
                    <div class="row creator-email">
                        <h5 class="col-2">Email</h5>
                        <p class="col-10">{{$creator->email}}</p>
                    </div>
                    <div class="row creator-date">
                        <h5 class="col-2">Created At</h5>
                        <p class="col-10">{{ \Carbon\Carbon::parse($creator->created_at)->toDayDateTimeString() }}</p>
                    </div>
                </div>
            </div>
        </div>
@endsection