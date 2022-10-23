<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\comment;
use App\Models\User;

class CommentController extends Controller
{

    public function store(Post $post){
        Comment::create([
            'body'=>request('body'),
            'post_id'=> $post->id,
            'post_creator'=>$post->user_id
        ]);
    }

}
