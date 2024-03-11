<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class AttentingSystemController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $attending = $event->attendings()->where('user_id', auth()->id())->first();

        // Toggle attendance status
        if (!is_null($attending)) {
            $attending->delete();
            return response()->json(['message' => 'Attendance removed'], 200);
        } else {
            $attending = $event->attendings()->create([
                'user_id' => auth()->id(),
                'num_tickets' => 1
            ]);
            return response()->json(['message' => 'Attendance added'], 200);
        }
    }
}
