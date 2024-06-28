<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    public function index(){
        $posts = Post::where('status', 2)
            ->orderByDesc('id')
            ->get();

        return view('posts.index', compact('posts'));
    }

    public function show($id){
        $matchThese = ['status' => 2, 'id' => $id];
        $posts = Post::where($matchThese)
            ->get();

        return view('posts.show', compact('posts'));
    }

    public function create(){
        $categories = Category::all();
        $tags = Tag::all();
        
        return view('posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request){

        $request->validate([
            // Validate that only supported options will be accepted
            'category_post' => 'required',
        ]);

        $post = Post::create([
            'name' => request('name_post'),
            'body' => request('message'),
            'category_id' => request('category_post'),
            'user_id' => auth()->id(),
            'slug' => Str::slug(request('name_post')),
            'extract' => Str::slug(request('name_post')),
            'status' => 2,
        ]);
        if ($request->tags != null){
        foreach ($request->tags as $key => $value) {
            $post->tags()->attach($key);
            $post->save();
            }
        }

        return to_route('posts.index')
            ->with('status', __('Publicación creada con éxito!'));
    }

    public function listByUser($id){
        $matchThese = ['status' => 2, 'user_id' => $id];
        $posts = Post::where($matchThese)
            ->get();

        return view('posts.index', compact('posts'));
    }
    public function destroy(Post $post){
        Post::destroy($post->id);
        $posts = Post::all();
        return view("posts.index",compact("posts"));
        if (auth()->id() !== $post->user_id) {
            return redirect()->route('posts.index')->with('error', __('No tienes permiso para eliminar esta publicación.'));
        }

        $post->delete();
        return redirect()->route('posts.index')->with('status', __('Publicación eliminada con éxito.'));
    }
}
