<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Index.
     */
    public function index() {
    return view('dashboard', [
        'totalUsers' => \App\Models\User::count(),
        'totalAppointments' => \App\Models\Appointment::count()
    ]);
    }

    
}
