<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'publication_date',
        'last_modified_date',
        'author_id',
        'category_id',
        'featured_image',
    ];

    protected $casts = [
        'publication_date' => 'datetime',
        'last_modified_date' => 'datetime',
    ];

    /**
     * Get the author that owns the post.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Get the category that owns the post.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the comments for the post.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * The tags that belong to the post.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
