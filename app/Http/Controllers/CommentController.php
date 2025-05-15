<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Topic $topic)
    {
        $request->validate([
            'body' => 'required|max:500',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'topic_id' => $topic->id,
            'body' => $request->body,
        ]);

        return back()->with('success', 'Comentario publicado.');
    }
}
