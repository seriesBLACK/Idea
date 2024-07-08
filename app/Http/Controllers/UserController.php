<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show()
    {
        $ideas = Post::where('user_id', auth()->id())->get();

        return view('profile', compact('ideas'));
    }
}
