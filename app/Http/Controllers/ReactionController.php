<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Comment;
use App\Models\Reaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReactionController extends Controller
{
    public function store(Topic $topic)
    {
        Reaction::firstOrCreate([
            'user_id' => Auth::id(),
            'topic_id' => $topic->id,
        ]);
        return back();
    }

    public function storeComment(Comment $comment)
    {
        Reaction::firstOrCreate([
            'user_id' => Auth::id(),
            'comment_id' => $comment->id,
        ]);
        return back();
    }
}

// app/Models/Reaction.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'topic_id', 'comment_id'];

    public function user() { return $this->belongsTo(User::class); }
    public function topic() { return $this->belongsTo(Topic::class); }
    public function comment() { return $this->belongsTo(Comment::class); }
}
