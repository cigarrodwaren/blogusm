<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Tag; 

class TagController extends Controller
{
    public function index(){
        $tags = Tag::all();

        return view("tags.index",compact("tags"));
    }

    public function create(){
        return view('tags.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>['required']
        ]);
        
        Tag::create([
            'name' => request('name_tag'),
            'slug' => Str::slug(request('name_tag')),
        ]);
        $tags = Tag::all();
        return view("tags.index",compact("tags"));
    }

    public function destroy(Tag $tag){
        Tag::destroy($tag->id);
        $tags = Tag::all();
        return view("tags.index",compact("tags"));
    }
}
