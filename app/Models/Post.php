<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['category', 'author']; // carga las relaciones especificadas para cada query

    public function scopeFilter($query, array $filters)
    {

        $query->when(
            $filters['search'] ?? false,
            fn($query, $search) =>
            $query->where(fn($query) =>
                $query
                    ->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%'))
        );
        $query->when(
            $filters['category'] ?? false,
            fn($query, $category) =>
            $query->whereHas('category', fn($query) => $query->where('slug', $category))
        );
        $query->when(
            $filters['author'] ?? false,
            fn($query, $author) =>
            $query->whereHas('author', fn($query) => $query->where('username', $author))
        );


    }
    public function comments(){
        return $this->hasMany(Comments::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    { // nombre del atributo
        return $this->belongsTo(User::class, 'user_id'); //aca se pasa el nombre de la foreign
    }

    //Sirve para bindear todas las rutas a un mismo parametro
//     public function getRouteKeyName()
//     {
//         return 'slug';
//     }


}