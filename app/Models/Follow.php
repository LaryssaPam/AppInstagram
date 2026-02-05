<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Follow extends Model

{
    // Protection du tableau et ajout de use Hasfactory
    
    use HasFactory;
    protected $fillable=[
        'follow_id',
        'following_id',
        'user_id',
        'post_id',
        'created_at',

    ];
      public function follower()
    {
        return $this->belongsTo(User::class, 'followerid');
    }

    public function following()
    {
        return $this->belongsTo(User::class, 'followingid');
    }
    
}
