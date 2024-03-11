<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;

class EventIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $events = Event::all(); //paginate(4)
        $categories = Category::with('events')->get();

        return view('eventIndex', compact('events', 'categories'));
    }
}
