<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\comment;
use App\Http\Requests\StorePostRequest;


class PostController extends Controller
{
    public function index(){
        $allPosts =Post::orderBy('created_at', 'desc')->paginate(7);
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
        // dd($allPost);
        return  view('posts.show',[
            'post' => $allPost,
            // 'user' => $allUser,
        ]);
    }


    public function store(StorePostRequest $request)
    {
        $data = $request->validated();

        $img_name=time() . '.'. $request->image->getClientOriginalExtension();

        Post::create([
            'title' => request()->title,
            'description' => $data['description'],
            'user_id' => $data['post_creator'],
            'image' => $img_name,
        ]);
        // dd($data);
        $request->image->move(public_path('images'),$img_name);

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
        $img_name=time() . '.'. $request->image->getClientOriginalExtension();
        //  dd($data);
            $request->validate([
                'title' => ['required', 'min:3','unique:posts,title,'.$id],
                'description' => ['required', 'min:10'],
                // 'image'=>['image','mimes:png,jpg','max:2048']
            ]);

        $postId = Post::find($id);

        $data = $request->all();
            $destination= 'images/'.$postId->image;
            if(File::exists($destination)){
                File::delete($destination);
            }

        $postId->update($data);
        $request->image->move(public_path('images'),$img_name);

        dd($data);
        return to_route('posts.index');

    }


    public function destroy($postId){
        $all = Post::find($postId);
        // Post::destroy($postId);
        $destination = 'images/'.$all->image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $all->delete();
        return to_route('posts.index');
        }

}
