<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $post = Post::orderBy('created_at', 'DESC');
        $search = request()->get('search', '');

        if ($search) {
            $post = $post->where('post', 'like', '%' . $search . '%');
        }
        return view('dashboard', [
            "ideas" => $post->paginate('5')
        ]);
    }
}
