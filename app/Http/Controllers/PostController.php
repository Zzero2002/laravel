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
        $allPosts = [
            ['id' => 1 , 'title' => 'laravel is cool', 'posted_by' => 'Ahmed', 'creation_date' => '2022-10-22'],
            ['id' => 2 , 'title' => 'PHP deep dive', 'posted_by' => 'Mohamed', 'creation_date' => '2022-10-15'],
            ['id' => 3 , 'title' => 'PHP deeps dives', 'posted_by' => 'Mohamedss', 'creation_date' => '2022-01-25'],
        ];
        if($postId){
            $allPosts =array_filter($allPosts,function($postId){
                return $postId['id']== request()->segment(count(request()->segments()));
            });
        }

        return view('posts.show',compact('allPosts'));
    }

    public function store()
    {
        return redirect()->route('posts.index')->with('message','data added successfully');
    }


}
