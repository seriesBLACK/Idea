<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class handelForm extends Controller
{
    public function show(Post $idea)
    {
        return view("idea.show", [
            "idea" => $idea
        ]);
    }


    public function store()
    {

        request()->validate([
            "idea" => 'required|min:3|max:240'
        ]);


        Post::create(
            [
                "post" => request()->get('idea', 'empty'),
                "user_id" => auth()->id()
            ]
        );


        return redirect()->route('dashboard')->with("flash", "post was sent successfuly");
    }

    public function destroy(Post $id)
    {
        $id->delete();

        return redirect()->route('dashboard')->with("flash", "post deleted");
    }

    public function edit(Post $idea)
    {
        $editing = true;

        return view("idea.show", [
            "idea" => $idea,
            "editing" => $editing
        ]);
    }

    public function update(Post $idea)
    {
        request()->validate([
            "content" => 'required|min:3|max:240'
        ]);

        $idea->post = request()->get('content');
        $idea->save();

        return redirect()->route('idea.show', $idea->id)->with('flash', "post updated");
    }
}
