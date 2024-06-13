<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|max:280',
        ], [
            'body.required' => 'Le champ message est obligatoire.',
            'body.max' => 'Le message ne peut pas dépasser 180 caractères.',
        ]);

        $userId = Auth::id();
        
        $user = User::find($userId);

        if (!$user) {
            Auth::logout();
            return redirect('login')->with('error', 'You need to be logged in to post a message');
        }

        Post::create([
            'body' => $request->input('body'),
            'user_id' => $userId,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
