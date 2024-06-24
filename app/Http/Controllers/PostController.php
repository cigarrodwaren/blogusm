<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    public function index(){
        $posts = Post::where('status', 2)->get();

        return view('posts.index', compact('posts'));
    }

    public function show($id){
        $matchThese = ['status' => 2, 'id' => $id];
        $posts = Post::where($matchThese)
            ->latest('id')
            ->get();

        return view('posts.show', compact('posts'));
    }

    public function create(){
        $categories = Category::all();
        $tags = Tag::all();
        
        return view('posts.create', compact('categories', 'tags'));
    }
}
