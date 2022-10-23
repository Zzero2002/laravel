<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $allPosts = [
            ['id' => 1 , 'title' => 'laravel is cool', 'posted_by' => 'Ahmed', 'creation_date' => '2022-10-22'],
            ['id' => 2 , 'title' => 'PHP deep dive', 'posted_by' => 'Mohamed', 'creation_date' => '2022-10-15'],
        ];

        return view('posts.index',[
            'posts' => $allPosts
        ]);
    }

    public function create()

    {
        return view('posts.create');
    }

    public function show($postId)
    {
        $arr = [
            ['id' => 1 , 'title' => 'laravel is cool', 'posted_by' => 'Ahmed', 'creation_date' => '2022-10-22','email'=>'ahmed@gmail.com'],
            ['id' => 2 , 'title' => 'PHP deep dive', 'posted_by' => 'Mohamed', 'creation_date' => '2022-10-15','email'=>'mohammed@gmail.com'],
        ];
        // dd($arr);

        return  view('posts.show',[
            'post' => $arr[$postId-1]
        ]);
    }


    public function store()
    {
        return redirect()->route('posts.index')->with('message','data added successfully');
    }


}
