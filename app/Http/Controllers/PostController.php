<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\comment;
use App\Http\Requests\StorePostRequest;


class PostController extends Controller
{
    public function index(){
        $allPosts =Post::paginate(10);
        // Carbon::resetToStringFormat();

        return view('posts.index',[
            'posts' => $allPosts,
        ]);
    }

    public function create()

    {
        $allUsers = User::all();

        return view('posts.create',[
            'allUsers' => $allUsers
        ]);
    }

    public function show($postId)
    {
        $allPost = Post::where('id', $postId)->first();
        // $allUser = User::Where('id',$userId)->first();

        return  view('posts.show',[
            'post' => $allPost,
            // 'user' => $allUser,
        ]);
    }


    public function store(StorePostRequest $request)
    {
        $data = $request->validated();
        Post::create([
            'title' => request()->title,
            'description' => $data['description'],
            'user_id' => $data['post_creator'],
        ]);

        return to_route('posts.index');
    }
    public function edit($postId){
        // $allPost = Post::all()->where('id',$postId);
        $allPost = Post::find($postId);
        $allUsers = User::all();
        // dd($postId);
        return  view('posts.edit',[
            'post' => $allPost,
            'allUsers' => $allUsers
        ]);

    }

    public function update(Request $request,$id ){
        $data = $request->all();
        //  dd($data);
        $request->validate([
            'title' => ['required', 'min:3','unique:posts,title,'.$id],
            'description' => ['required', 'min:10'],
        ]);
        // dd($data);
        $postId = Post::find($id);
        $postId->update($data);
        return to_route('posts.index');

    }


    public function destroy($postId){
        Post::destroy($postId);
        return to_route('posts.index');
        }

}
