<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class dashborad extends Controller
{
    public function index()
    {

        return view('dashboard', [
            "ideas" => Post::orderBy('created_at', 'DESC')->paginate('5')
        ]);
    }
}
