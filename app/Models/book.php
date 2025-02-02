<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['category', 'author'];

    // public function scopeFilter($query, array $filters)
    // {
    //     $query->when($filters['search'] ?? false, function($query, $search) {
    //         return $query->where('tittle', 'like', '%' . $search . '%')
    //                     ->orWhere('body', 'like', '%' . $search . '%');
    //     });

    //     $query->when($filters['category'] ?? false, function($query, $category) {
    //         return $query->whereHas('category', function($query) use ($category) {
    //             $query->where('slug', $category);
    //         });
    //     });

    //     $query->when($filters['author'] ?? false, fn($query, $category) =>
    //         $query->whereHas('author', fn($query) =>
    //             $query->where('username', '$author')
    //         )
    //     );

    // }

    public function reviews()
    {
        return $this->hasMany(review::class);
    }

    public function borrows()
    {
        // return $this->hasMany(borrow::class);
        return $this->hasMany(borrow::class, 'book_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
