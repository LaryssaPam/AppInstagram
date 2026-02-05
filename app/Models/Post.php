<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    // Protection du tableau et ajout de UseHasfactory
use HasFactory;
  protected $fillable =[
    'user_id',
    'image_url',
    'caption',
    'updated_at',
    'created_at',
];
    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'postid');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'postid');
    }

    // Accessor pour le nombre de likes
    public function getLikesCountAttribute()
    {
        return $this->likes()->count();
    }

    // Accessor pour vérifier si l'utilisateur courant a liké
    public function getIsLikedByCurrentUserAttribute()
    {
        if (!auth()->check()) return false;
        return $this->likes()->where('userid', auth()->id())->exists();
    }
}

