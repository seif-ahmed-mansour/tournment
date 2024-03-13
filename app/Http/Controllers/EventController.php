<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventParticipant;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view("adminDashboard", ['events' => $events]);
    }
    public function add()
    {
        return view('addEvent');
    }
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:team,individual',
            'category' => 'required|string|max:255',
            'questions.*' => 'required|string|max:255',
            'answers.*' => 'required|string|max:255',
        ]);

        // Create the event
        $event = Event::create([
            'name' => $validatedData['name'],
            'type' => $validatedData['type'],
            'category' => $validatedData['category'],
        ]);

        // Create questions
        foreach ($validatedData['questions'] as $index => $questionText) {
            Question::create([
                'event_id' => $event->id,
                'question' => $questionText,
                'answer' => $validatedData['answers'][$index],
            ]);
        }

        // Redirect or return response as needed
        return redirect("/admin");
    }
    public function participate(Request $request)
    {
        $user = Auth::user(); // Get the authenticated user

        // Check if the user is authenticated
        if ($user) {
            // Get the user's type
            $userType = $user->type;

            // Get events based on user type
            $events = Event::where('type', $userType)->get();

            // Participate in events
            foreach ($events as $event) {
                // Check if the user is already participating in the event
                $existingParticipant = EventParticipant::where('event_id', $event->id)
                    ->where('user_id', $user->id)
                    ->first();

                // If the user is not already participating, create a new participant entry
                if (!$existingParticipant) {
                    EventParticipant::create([
                        'user_id' => $user->id,
                        'event_id' => $event->id,
                    ]);
                }
            }

            // Redirect or return a response as needed
        } else {
            // Handle the case where the user is not authenticated
        }
    }

}
