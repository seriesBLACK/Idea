<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class handelForm extends Controller
{
    public function store()
    {

        request()->validate([
            "idea" => 'required|min:3|max:240'
        ]);


        $idea = Post::create(
            [
                "post" => request()->get('idea', 'empty')
            ]
        );

        $idea->save();

        return redirect()->route('dashboard')->with("flash", "post was sent successfuly");
    }

    public function destroy($id)
    {
        $post = Post::where('id', $id)->first();
        $post->delete();
        return redirect()->route('dashboard')->with("flash", "post deleted");
    }
}
