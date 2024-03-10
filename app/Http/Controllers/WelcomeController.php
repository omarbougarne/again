<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $events = Event::all();
        $categories = Category::with('events')->get();

        return view('welcome', compact('events'));
    }
}
