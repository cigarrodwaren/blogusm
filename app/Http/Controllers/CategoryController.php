<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view("category.index",compact("categories"));
    }

    public function create(){
        return view('category.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>['required']
        ]);
        Category::create([
            'name' => request('name_cat'),
            'slug' => Str::slug(request('name_cat')),
        ]);
        $categories = Category::all();
        return view("category.index",compact("categories"));
    }

    public function destroy(Category $category){
        Category::destroy($category->id);
        $categories = Category::all();
        return view("Category.index",compact("categories"));
    }
}
