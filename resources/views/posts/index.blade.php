@extends('layouts.app')
@section('title') Index @endsection
@section('content')
<div class="container">
<div class="text-center">
    <a href="{{route('posts.create')}}" class="mt-4 btn btn-success">Create Post</a>
  </div>
  <table class="table mt-4">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Posted By</th>
        <th scope="col">Created At</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @if (!empty($posts) && $posts->count())

      @foreach ($posts as $post)
        <tr>
          <td>{{$post->id}}</th>
          <td>{{$post->title}}</td>
          @if($post->user)
          <td>{{$post->user->name}}</td>
        @else
          <td>Not Defined</td>
        @endif
          <td>{{date('Y-m-d',strtotime($post->created_at))}}</td>
          <td>
              <a href="{{route('posts.show', $post['id'])}}" class="btn btn-info">View</a>
              {{-- <a href="{{route('posts.show', ['post' =>$post['id']])}}" class="btn btn-info">View</a> --}}
              <a href="{{route('posts.edit', $post['id'])}}" class="btn btn-primary">Edit</a>
              <form method="POST" class="d-inline" action="{{route('posts.destroy', $post['id'])}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>

            </form>
          </td>
        </tr>
      @endforeach
      @else
      <tr>
        <td colspan="3">there are no data</td>
      </tr>
      @endif

    </tbody>
  </table>
  <div class="row">
    {{$posts->links()}}
  </div>
  @endsection


</div>
  {{-- @if(session()->has('message'))
   <h1 class="alert alert-danger">{{session()->get('message')}}
</h1>
@endif --}}
