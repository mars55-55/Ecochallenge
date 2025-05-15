<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::with(['user', 'reactions'])->latest()->paginate(10);
        return view('forum.index', compact('topics'));
    }

    public function create()
    {
        return view('forum.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        Topic::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('topics.index')->with('success', 'Tema creado correctamente.');
    }

    public function show(Topic $topic)
    {
        $topic->load(['user', 'comments.user']);
        return view('forum.show', compact('topic'));
    }
}
