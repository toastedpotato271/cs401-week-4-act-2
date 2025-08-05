<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment_content',
        'comment_date',
        'commenter_id',
        'post_id',
        'is_hidden',
    ];

    protected $casts = [
        'comment_date' => 'datetime',
        'is_hidden' => 'boolean',
    ];

    /**
     * Get the user that owns the comment.
     */
    public function commenter()
    {
        return $this->belongsTo(User::class, 'commenter_id');
    }

    /**
     * Get the post that owns the comment.
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
