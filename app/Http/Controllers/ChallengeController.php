<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $challenges = Challenge::all();
        return view('challenges.index', compact('challenges'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('challenges.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'frequency' => 'required|in:diario,semanal',
            'co2_saved' => 'nullable|numeric',
            'water_saved' => 'nullable|numeric',
            'waste_avoided' => 'nullable|numeric',
        ]);
        $data['created_by'] = Auth::id();
        Challenge::create($data);
        return redirect()->route('challenges.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Challenge $challenge)
    {
        return view('challenges.show', compact('challenge'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Challenge $challenge)
    {
        return view('challenges.edit', compact('challenge'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Challenge $challenge)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'frequency' => 'required|in:diario,semanal',
            'co2_saved' => 'nullable|numeric',
            'water_saved' => 'nullable|numeric',
            'waste_avoided' => 'nullable|numeric',
        ]);
        $challenge->update($data);
        return redirect()->route('challenges.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Challenge $challenge)
    {
        $challenge->delete();
        return redirect()->route('challenges.index');
    }
}
