<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'ideas';
    protected $fillable = ['post', 'likes'];

    public function comments()
    {
        return $this->hasMany(Comment::class, "idea_id", "id");
    }
}
