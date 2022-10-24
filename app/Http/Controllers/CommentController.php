<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\comment;
use App\Models\User;

class CommentController extends Controller
{

   public function store($postId)
    {
        $post = Post::find($postId);
        $data = request()->all();
            $comment = $post->comments()->create([
                'body' => $data["comment"]
            ]);
        // dd()
        return redirect()->route('posts.show',$postId);
    }

}
