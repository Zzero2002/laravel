@extends('layouts.app')
@section('title') create @endsection

@section('content')
        <form method="POST" action="{{route('posts.update', $post['id'])}}">
          @csrf
          @method('PUT')
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Title</label>
              <input name="title" value="{{$post->title}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Description</label>
                <input name="description" value="{{$post->description}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Post Creator</label>
                <select name="user_id" class="form-control">
                    @foreach ($allUsers as $user)
                    <option {{$user->id == $post->user_id ? 'selected':''}} value="{{$user->id}}">{{ $user->name }}</option>
                  @endforeach
                    </option>
                </select>
              </div>

            <button type="submit" class="btn btn-primary">Update</button>
          </form>

@endsection
