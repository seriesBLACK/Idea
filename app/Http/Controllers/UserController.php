<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('users.user-show', compact('user'));
    }

    public function edit(User $user)
    {
        $editting = true;
        return view('users.user-show', compact('user', 'editting'));
    }
}
