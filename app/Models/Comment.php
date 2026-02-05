<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'user_id',
        'post_id',
        'content_id',
        'updated_at',
        'created_at',

    ];
}
