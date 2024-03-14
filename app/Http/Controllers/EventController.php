<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventParticipant;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        if (Auth::check()) {
            $user = Auth::user();

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

            if ($events->isEmpty()) {
                return view('no_existing_events');
            } else {
                // Redirect the user to the questions page of the first event they participated in
                return redirect()->route('showQuestions', $events->first());
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function showQuestions(Event $event)
    {
        // Retrieve questions for the specified event
        $questions = $event->questions;

        return view('show_questions', compact('event', 'questions'));
    }

    public function submitAnswers(Request $request, Event $event)
    {
        // Validate the submitted answers and update scores
        $user = auth()->user();
        $answers = $request->input('user_answers');

        foreach ($answers as $questionId => $answer) {
            $question = Question::findOrFail($questionId);
            if ($question->answer === $answer) {
                // Update or create the event participant record and increment the score by 5
                $participant = EventParticipant::updateOrCreate(
                    ['event_id' => $event->id, 'user_id' => $user->id],
                    ['score' => EventParticipant::where('event_id', $event->id)
                        ->where('user_id', $user->id)
                        ->value('score') + 5]
                );
            }
        }

        // Determine the next event (you need to implement this logic)
        // Determine the next event (you need to implement this logic)
        $nextEvent = Event::where('id', '>', $event->id)->first();

        // Redirect to the next event or leaderboard
        if ($nextEvent) {
            return redirect()->route('showQuestions', $nextEvent);
        } else {
            return redirect()->route('leaderboard');
        }
    }




    public function leaderboard()
    {
        // Retrieve non-admin users with their related event participants
        $users = User::with(['participants' => function ($query) {
            $query->select('user_id', DB::raw('SUM(score) as total_score'))
                ->groupBy('user_id');
        }])
        ->where('role', 'user')
        ->get();

        // Sort users by total score
        $leaderboard = $users->sortByDesc(function ($user) {
            return $user->participants->sum('total_score');
        });
        return view('leaderboard', compact('leaderboard'));
    }




    public function eventLeaderboard(Event $event)
    {
        // Retrieve leaderboard data for a specific event
        $eventLeaderboard = $event->participants()->with('user')->orderByDesc('score')->get();

        return view('event_leaderboard', compact('event', 'eventLeaderboard'));
    }
}
