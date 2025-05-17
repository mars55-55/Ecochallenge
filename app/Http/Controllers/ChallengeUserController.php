<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\UserMetric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ChallengeUserController extends Controller
{
    // Asignar retos personalizados según eco_preferences
    public function assign()
    {
        $user = Auth::user();
        $preferences = explode(',', $user->eco_preferences ?? '');
        $challenges = Challenge::whereIn('category', $preferences)
            ->whereDoesntHave('users', function($q) use ($user) {
                $q->where('user_id', $user->id);
            })
            ->get();

        foreach ($challenges as $challenge) {
            $user->challenges()->attach($challenge->id, ['assigned_at' => now()]);
        }

        return redirect()->route('challenges.index');
    }

    // Marcar reto como completado
    public function complete(Request $request, Challenge $challenge)
    {
        $user = Auth::user();
        $user->challenges()->updateExistingPivot($challenge->id, [
            'completed_at' => now()
        ]);

        // Registrar métricas
        UserMetric::updateOrCreate(
            [
                'user_id' => $user->id,
                'date' => Carbon::today()
            ],
            [
                'co2_saved' => \DB::raw('co2_saved + ' . ($challenge->co2_saved ?? 0)),
                'water_saved' => \DB::raw('water_saved + ' . ($challenge->water_saved ?? 0)),
                'waste_avoided' => \DB::raw('waste_avoided + ' . ($challenge->waste_avoided ?? 0)),
            ]
        );

        return redirect()->route('dashboard.index');
    }
}
