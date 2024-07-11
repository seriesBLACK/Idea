<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function show(User $user)
    {
        $ideas = $user->ideas()->paginate(5);
        return view('users.show', compact('user', 'ideas'));
    }

    public function edit(User $user)
    {
        $editting = true;
        $ideas = $user->ideas()->paginate(5);
        return view('users.edit', compact('user', 'editting', 'ideas'));
    }

    public function update(User $user)
    {

        $validate = request()->validate([
            "name" => "required|min:3|max:40",
            "bio" => 'nullable|min:3|max:300',
            "image" => "image"
        ]);

        if (request('image')) {
            $imagePath = request()->file('image')->store('profile', 'public');
            $validate['image'] = $imagePath;

            Storage::disk('public')->delete($user->image ?? '');
        }

        $user->update($validate);
        $ideas = $user->ideas()->paginate(5);
        return view('users.show', compact('user', 'ideas'));
    }

    public function follow(User $user)
    {
        $follower = auth()->user();
        $follower->followings()->attach($user);

        $ideas = $user->ideas()->paginate(5);
        return view('users.show', compact('user', 'ideas'));
    }

    public function unfollow(User $user)
    {
        $follower = auth()->user();
        $follower->followings()->detach($user);

        $ideas = $user->ideas()->paginate(5);
        return view('users.show', compact('user', 'ideas'));
    }
}
