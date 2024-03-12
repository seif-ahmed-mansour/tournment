<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Question;
use Illuminate\Http\Request;

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
}
