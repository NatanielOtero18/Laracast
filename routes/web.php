<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Services\Newsletter;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('newsletter', NewsletterController::class);

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comment', [PostCommentController::class, 'store']);


Route::get('admin/posts',[AdminPostController::class,'index'])->middleware('admin');
Route::post('admin/post',[AdminPostController::class,'store'])->middleware('admin');
Route::get('admin/post/create',[AdminPostController::class,'create'])->middleware('admin');
Route::get('admin/post/{post}/edit',[AdminPostController::class,'edit'])->middleware('admin');
Route::patch('admin/post/{post}',[AdminPostController::class,'update'])->middleware('admin');
Route::delete('admin/post/{post}',[AdminPostController::class,'destroy'])->middleware('admin');


Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');
Route::get('login', [SessionsController::class, 'create'])->middleware('guest')->name('login');

// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('posts', [
//         'posts' => $category->posts,
//         'currentCategory' => $category,
//         'categories' =>  Category::all()
//     ]);
// });

// Route::get('/authors/{author:slug}', function (User $author) {

//     return view('posts.index', [
//         'posts' => $author->posts
//     ]);
// });
