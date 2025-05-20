<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Topic;


class AdminPanelController extends Controller
{
    public function index()
    {
        // Mostrar el dashboard en vez de una vista admin.index
        return view('dashboard');
    }

    public function users()
    {

        $users = \App\Models\User::all();
        return view('admin.users', compact('users'));
    }
}
