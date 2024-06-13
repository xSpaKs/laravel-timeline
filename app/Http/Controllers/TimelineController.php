<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Post;

class TimelineController extends Controller
{
    public function timeline()
    {
        $posts = Post::latest()->simplePaginate(3);

        return view("timeline")->with("posts", $posts);
    }

    public function user()
    {
        $posts = Post::latest()->where("user_id", Auth::id())->simplePaginate(3);

        return view("timeline")->with("posts", $posts);
    }
}
