<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    public function users()
    {
        $users = \App\Models\User::all();
        return view('admin.user_report', compact('users'));
    }
}
