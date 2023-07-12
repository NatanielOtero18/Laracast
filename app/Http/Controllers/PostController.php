<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->
                filter(request(['search', 'category', 'author']))->
                paginate(5)->withQueryString(), //mantiene la query de filtro cuando se cambia de pag
            //evitar n+1 en lazy loading
            // 'categories' => Category::all(),
            // 'currentCategory' => Category::firstWhere('slug',request(['category']))
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}