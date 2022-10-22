@extends('layouts.app')

@section('title') view @endsection

@section('content')


<table class="table table-striped mt-5 table-bordered table-hover">
    @foreach ($allPosts as $p)
    <tr>
        <td>{{$p['title']}}</td>
        <td>{{$p['posted_by']}}</td>
        <td>{{$p['creation_date']}}</td>
    </tr>

    @endforeach

</table>


@endsection
