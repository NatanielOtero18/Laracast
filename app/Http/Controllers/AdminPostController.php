<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    //
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::simplePaginate(5)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }
    public function store()
    {


        $att = request()->validate([
            'title' => ['required', Rule::unique('posts', 'title')],
            'excerpt' => 'required',
            'thumbnail' => 'required|image',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'slug' => ['required', Rule::unique('posts', 'slug')],
        ]);

        $att['user_id'] = auth()->id();
        $att['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        Post::create($att);

        return redirect(route('home'))->with('success', 'Post created');

    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $att = request()->validate([
            'title' => ['required', Rule::unique('posts', 'title')->ignore($post->id)],
            'excerpt' => 'required',
            'thumbnail' => 'image',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
        ]);
        if (isset($att['thumbnail'])) {
            $att['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }
        $post->update($att);
        return back()->with('success', 'Post updated');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post deleted');
    }
}
