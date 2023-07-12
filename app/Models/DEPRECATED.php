<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

// class Post extends Model
// {
//     public $title;
//     public $excerpt;
//     public $date;
//     public $body;
//     public $slug;

//     public function __construct($title, $excerpt, $date, $slug, $body)
//     {

//         $this->title = $title;
//         $this->excerpt = $excerpt;
//         $this->date = $date;
//         $this->body = $body;
//         $this->slug = $slug;


//     }
//     public static function find($slug)
//     {

//         $posts = static::getAll();


//         $post = $posts->firstWhere('slug', $slug);

//         if(!$post){
//             throw new ModelNotFoundException;
//         }

//         return $post;
//     }

//     public static function getAll()
//     {
//         return cache()->rememberForever('posts.all', function () {
//             return collect(File::files(resource_path('posts')))
//                 ->map(function ($file) {
//                     return YamlFrontMatter::parseFile($file);

//                 })->map(function ($document) {
//                 return new Post(
//                     $document->title,
//                     $document->excerpt,
//                     $document->date,
//                     $document->slug,
//                     $document->body()
//                 );
//             })->sortBy('date');

//         });
//     }
// }
