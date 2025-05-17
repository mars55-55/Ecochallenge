<?php

namespace App\Http\Controllers;

use App\Models\HabitEvaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HabitEvaluationController extends Controller
{
    public function form() {
        return view('habit_evaluations.form');
    }

    public function submit(Request $request) {
        // Ejemplo simple de cálculo de huella de carbono
        $answers = $request->except('_token');
        $carbon = array_sum(array_map('intval', $answers)); // Solo ejemplo
        HabitEvaluation::create([
            'user_id' => Auth::id(),
            'answers' => json_encode($answers),
            'carbon_footprint' => $carbon,
        ]);
        return view('habit_evaluations.result', compact('carbon'));
    }
}
