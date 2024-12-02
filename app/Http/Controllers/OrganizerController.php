<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    public function index()
    {
        // Organizer dashboard logic
        return view('dashboard.organizer.home');
    }
}
