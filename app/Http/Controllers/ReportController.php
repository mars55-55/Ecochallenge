<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Comment;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function store(Request $request, Topic $topic)
    {
        Report::create([
            'user_id' => Auth::id(),
            'topic_id' => $topic->id,
            'reason' => $request->input('reason', 'Contenido inapropiado'),
        ]);
        return back()->with('success', 'Tema reportado.');
    }

    public function storeComment(Request $request, Comment $comment)
    {
        Report::create([
            'user_id' => Auth::id(),
            'comment_id' => $comment->id,
            'reason' => $request->input('reason', 'Contenido inapropiado'),
        ]);
        return back()->with('success', 'Comentario reportado.');
    }
}
