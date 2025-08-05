<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category_name',
        'slug',
        'description',
    ];

    /**
     * Get the posts for the category.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
