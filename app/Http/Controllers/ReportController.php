<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Comment;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\UserMetric;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function store(Request $request, Topic $topic)
    {
        $request->validate([
            'reason' => 'required|string|max:255',
        ]);
        Report::create([
            'user_id' => Auth::id(),
            'topic_id' => $topic->id,
            'reason' => $request->input('reason'),
        ]);
        return back()->with('success', [
            'title' => 'Reporte enviado',
            'message' => 'El tema fue reportado y será revisado por el equipo de administración.',
            'type' => 'info',
        ]);
    }

    public function storeComment(Request $request, Comment $comment)
    {
        $request->validate([
            'reason' => 'required|string|max:255',
        ]);
        Report::create([
            'user_id' => Auth::id(),
            'comment_id' => $comment->id,
            'reason' => $request->input('reason'),
        ]);
        return back()->with('success', [
            'title' => 'Reporte enviado',
            'message' => 'El comentario fue reportado y será revisado por el equipo de administración.',
            'type' => 'info',
        ]);
    }

    public function generateUserReport(User $user)
    {
        // Obtén métricas avanzadas
        $metrics = $user->metrics()->orderBy('date')->get();
        $total_co2 = $metrics->sum('co2_saved');
        $total_water = $metrics->sum('water_saved');
        $total_waste = $metrics->sum('waste_avoided');

        // Prepara datos para gráficas
        $dates = $metrics->pluck('date')->map(fn($d) => $d->format('Y-m-d'))->toArray();
        $co2 = $metrics->pluck('co2_saved')->toArray();
        $water = $metrics->pluck('water_saved')->toArray();
        $waste = $metrics->pluck('waste_avoided')->toArray();

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.user_report', [
            'user' => $user,
            'total_co2' => $total_co2,
            'total_water' => $total_water,
            'total_waste' => $total_waste,
            'dates' => $dates,
            'co2' => $co2,
            'water' => $water,
            'waste' => $waste,
        ]);

        $path = storage_path('app/public/user_report_'.$user->id.'.pdf');
        $pdf->save($path);

        \Mail::send('emails.user_report', ['user' => $user], function($message) use ($user, $path) {
            $message->to($user->email)
                ->subject('Reporte detallado de tu actividad')
                ->attach($path);
        });

        return back()->with('success', 'Reporte enviado al correo del usuario.');
    }

    public function downloadMyReport()
    {
        $user = Auth::user();
        $metrics = $user->metrics()->orderBy('date')->get();
        $total_co2 = $metrics->sum('co2_saved');
        $total_water = $metrics->sum('water_saved');
        $total_waste = $metrics->sum('waste_avoided');

        $dates = $metrics->pluck('date')->map(fn($d) => $d->format('Y-m-d'))->toArray();
        $co2 = $metrics->pluck('co2_saved')->toArray();
        $water = $metrics->pluck('water_saved')->toArray();
        $waste = $metrics->pluck('waste_avoided')->toArray();

        $pdf = Pdf::loadView('admin.user_report', [
            'user' => $user,
            'total_co2' => $total_co2,
            'total_water' => $total_water,
            'total_waste' => $total_waste,
            'dates' => $dates,
            'co2' => $co2,
            'water' => $water,
            'waste' => $waste,
        ]);

        return $pdf->download('mi_reporte_ecologico.pdf');
    }
}
