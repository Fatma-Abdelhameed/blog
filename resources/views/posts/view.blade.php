<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .posts{
            border-collapse: separate;
            border-spacing:0 20px;
        }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ITI Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">All Posts</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
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
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>