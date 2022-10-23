@extends('layouts.app')

@section('title') Show @endsection
@section('content')
<div class="card mt-5">
  <h5 class="card-header">Post Info</h5>
  <div class="card-body">
    <h5 class="card-title">Title: {{$post['title']}}</h5>
    <p class="card-text">Description</p>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

  </div>
</div>
<div class="card">
  <h5 class="card-header">Post Creator Info</h5>
  <div class="card-body">
    <h5 class="card-title"></h5>
    <p class="card-text"><span>Name:</span> {{$post['posted_by']}}</p>
    <p class="card-text"><span>Email:</span> {{$post['email']}}</p>
    <p class="card-text"><span>Created at:</span> {{$post['creation_date']}}</p>
    <a href="{{route('posts.index')}}" class="btn btn-primary">Go back</a>
  </div>
</div>
@endsection
