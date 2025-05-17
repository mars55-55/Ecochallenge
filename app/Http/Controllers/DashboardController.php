<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\UserMetric;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $metrics = UserMetric::where('user_id', $user->id)->get();

        $total_co2 = $metrics->sum('co2_saved');
        $total_water = $metrics->sum('water_saved');
        $total_waste = $metrics->sum('waste_avoided');
        $completed_challenges = $user->challenges()->wherePivotNotNull('completed_at')->count();

        return view('dashboard.index', compact('total_co2', 'total_water', 'total_waste', 'completed_challenges'));
    }
}
