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
}
