<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'body',
    ];
    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }
    public function OwnedBy(User $user)
    {
        return $this->user_id === $user->id;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function likes()
    {
        return $this->hasMany(like::class);
    }
}
