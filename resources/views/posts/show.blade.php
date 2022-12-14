@extends('layouts.app')

@section('title') Show @endsection

@section('content')

<style>
   .comments li{
    border:5px solid wheat;
    padding:15px;
    margin-bottom: 15px;
   }

</style>
<div class="container">
<div class="card mt-5">
  <h5 class="card-header">Post Info</h5>
  <div class="card-body">
    @if ($post->image)

        <img class="w-25 img-fluid img-thumbnail" src="{{ URL::to('/') }}/images/{{ $post->image }}" alt="">
        @endif

    <h5 class="card-title">Title: {{$post['title']}}</h5>
    <p class="card-text">Description :</p>
    <p class="card-text">{{$post['description']}}</p>
    </div>
</div>
<div class="card mt-2">
  <h5 class="card-header">Post Creator Info</h5>
  <div class="card-body">
    <h5 class="card-title"></h5>
    <p class="card-text"><span>Name:</span>@if ($post->user)
        {{$post->user->name}}
        @else
        No user Create it
    @endif </p>
    <p class="card-text"><span>Email:</span> @if ($post->user)
        {{$post->user->email}}
        @else
        No user Create it
    @endif </p>
    <p class="card-text"><span>Created at:</span> @if ($post->user)
        {{$post->user->created_at->format('l jS \\of F Y h:i:s A')}}
        @else
        No user Create it
    @endif </p>
    <a href="{{route('posts.index')}}" class="btn btn-primary">Go back</a>
  </div>
</div>
<br><br>

<div class="comments container">
    <h1>Comments: </h1>
    <ol class="list-unstyled">
    @foreach ($post->comments as $comment )
     <li>
        <div class="row toto">
            <div class="col-12">
                <h3 style="color:red;">  {{$comment->body}} </h3>
            </div>
        </div>
     </li>
    @endforeach
    </ol>
</div>
<br><br>

<form action="{{route('comments.store',$post->id)}}" method="POST">

    @csrf
    <div class="form-group">
    <label for="body">Comment</label>
    <textarea name="comment" id="body" class="form-control"></textarea>
</div>
    <div class="form-group add-comment">
        <button type="submit" class="btn btn-success">Add comment</button>
    </div>
</form>
</div>
@endsection
