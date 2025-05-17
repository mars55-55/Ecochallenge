<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\UserMetric;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserMetricController extends Controller
{
    public function history()
    {
        $user = Auth::user();
        $metrics = UserMetric::where('user_id', $user->id)
            ->orderBy('date')
            ->get();

        return view('user_metrics.history', compact('metrics'));
    }
}
