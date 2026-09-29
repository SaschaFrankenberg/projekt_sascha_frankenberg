<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();

        $workshops = Workshop::all();

        return view('dashboard', compact('user', 'workshops'));
    }
}
