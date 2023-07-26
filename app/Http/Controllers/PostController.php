<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->
                filter(request(['search', 'category', 'author']))->
                paginate(6)->withQueryString(), //mantiene la query de filtro cuando se cambia de pag
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
