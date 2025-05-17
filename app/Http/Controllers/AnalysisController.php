<?php

namespace App\Http\Controllers;

use App\Models\SurveyResponse;
use App\Models\ManualAction;
use App\Models\HabitEvaluation;
use Illuminate\Support\Facades\Auth;

class AnalysisController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Encuestas: promedio de satisfacción
        $surveyResponses = SurveyResponse::where('user_id', $user->id)->get();
        $satisfaccionAvg = $surveyResponses->pluck('responses')->map(function($resp) {
            $data = json_decode($resp, true);
            return isset($data['satisfaccion']) ? (int)$data['satisfaccion'] : null;
        })->filter()->avg();

        // Acciones manuales: cantidad total
        $manualActionsCount = ManualAction::where('user_id', $user->id)->count();

        // Evaluaciones de hábitos: promedio de huella de carbono
        $habitAvg = HabitEvaluation::where('user_id', $user->id)->avg('carbon_footprint');

        return view('analysis.index', compact('satisfaccionAvg', 'manualActionsCount', 'habitAvg'));
    }
}
