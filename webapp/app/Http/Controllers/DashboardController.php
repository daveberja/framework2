<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard', [
            'title' => 'Dashboard', // You can pass additional data here if needed
        ]);
    }
}
