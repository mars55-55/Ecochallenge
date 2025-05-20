<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\SurveyResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    public function form() {
        $survey = Survey::first(); // Solo una encuesta de ejemplo
        return view('surveys.form', compact('survey'));
    }

    public function submit(Request $request) {
        $survey = Survey::first();
        SurveyResponse::create([
            'survey_id' => $survey->id,
            'user_id' => Auth::id(),
            'responses' => json_encode($request->except('_token'))
        ]);
        return view('surveys.thanks');
    }

    public function create() {
        return view('surveys.admin_form');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'questions' => 'required|array',
            'questions.*.text' => 'required|string',
            'questions.*.type' => 'required|string',
        ]);
        // Procesar opciones para preguntas tipo select
        foreach ($data['questions'] as &$q) {
            if ($q['type'] === 'select' && isset($q['options'])) {
                $q['options'] = array_map('trim', explode(',', $q['options']));
            } else {
                unset($q['options']);
            }
        }
        Survey::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'questions' => $data['questions'],
        ]);
        return redirect()->route('dashboard')->with('success', 'Encuesta creada correctamente.');
    }
}
