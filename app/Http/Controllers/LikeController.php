<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function like(Request $request)
{
    $userId = Auth::id();

    if (!$userId) {
        return redirect('login')->with('error', 'You need to be logged in to like a post');
    }

    $postId = $request->input('post_id');

    $existingLike = Like::where('user_id', $userId)
                        ->where('post_id', $postId)
                        ->first();

    if ($existingLike) { $existingLike->delete(); } 
    else { Like::create([ 'user_id' => $userId, 'post_id' => $postId, ]); }

    return redirect()->back();
}
}
