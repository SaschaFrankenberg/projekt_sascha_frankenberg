<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'organizer') {
            // Organisator alle Workshops
            $workshops = Workshop::withCount('members')->get();
        } else {
            // Mitglied sieht nur die, bei denen er angemeldet ist
            $workshops = $user->workshops()->withCount('members')->get();
        }

        return view('dashboard', compact('user', 'workshops'));
    }
}
