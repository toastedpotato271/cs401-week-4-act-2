<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'tag_name',
        'slug',
        'description',
    ];

    /**
     * The posts that belong to the tag.
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
