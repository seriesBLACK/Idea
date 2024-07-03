<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'ideas';
    protected $fillable = ['post', 'likes', 'user_id'];

    public function comments()
    {
        return $this->hasMany(Comment::class, "idea_id", "id");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
