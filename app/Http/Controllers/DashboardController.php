<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use App\Models\Appointment;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index()
    {
        // Opcional: Contagem rápida para mostrar no dashboard (dá um ar profissional)
        $counts = [
            'users' => User::count(),
            'services' => Service::count(),
            'appointments' => Appointment::count(),
        ];

        return view('dashboard.index', compact('counts'));
    }
}