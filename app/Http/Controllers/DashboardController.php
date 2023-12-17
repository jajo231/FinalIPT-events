<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $eventCount = Event::count();

        return view('dashboard'
        , compact('eventCount')
    );
    }
}
