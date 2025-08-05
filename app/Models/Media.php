<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'file_name',
        'file_path',
        'file_size',
        'file_type',
        'upload_date',
        'description',
    ];

    protected $casts = [
        'upload_date' => 'datetime',
    ];
}
