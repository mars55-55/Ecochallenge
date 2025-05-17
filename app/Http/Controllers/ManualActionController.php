<?php

namespace App\Http\Controllers;

use App\Models\ManualAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManualActionController extends Controller
{
    public function index() {
        $actions = ManualAction::where('user_id', Auth::id())->get();
        return view('manual_actions.index', compact('actions'));
    }

    public function create() {
        return view('manual_actions.create');
    }

    public function store(Request $request) {
        $request->validate([
            'action' => 'required',
            'date' => 'required|date',
        ]);
        ManualAction::create([
            'user_id' => Auth::id(),
            'action' => $request->action,
            'description' => $request->description,
            'date' => $request->date,
        ]);
        return redirect()->route('manual-actions.index');
    }
}
