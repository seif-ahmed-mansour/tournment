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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:team,individual',
            'category' => 'required|string|max:255',
            'questions.*' => 'required|string|max:255',
            'answers.*' => 'required|string|max:255',
        ]);

        $event = Event::create([
            'name' => $validatedData['name'],
            'type' => $validatedData['type'],
            'category' => $validatedData['category'],
        ]);
        foreach ($validatedData['questions'] as $index => $questionText) {
            Question::create([
                'event_id' => $event->id,
                'question' => $questionText,
                'answer' => $validatedData['answers'][$index],
            ]);
        }
        return redirect("/admin");
    }
    public function participate(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $userType = $user->type;
            $events = Event::where('type', $userType)->get();
            foreach ($events as $event) {
                if ($event->type === 'individual') {
                    $participantCount = EventParticipant::where('event_id', $event->id)->count();
                    if ($participantCount >= 20) {
                        return redirect()->route('eventSeatsCompleted');
                    }
                }
                $existingParticipant = EventParticipant::where('event_id', $event->id)
                    ->where('user_id', $user->id)
                    ->first();
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
                return redirect()->route('showQuestions', $events->first());
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function eventSeatsCompleted()
    {
        return view('event_seats_completed');
    }

    public function showQuestions(Event $event)
    {
        $user = auth()->user();
        $userType = $user->type;
        $questions = ($event->type === $userType) ? $event->questions : [];

        $participant = EventParticipant::where('event_id', $event->id)
            ->where('user_id', $user->id)
            ->first();

        if ($participant && $participant->score > 0) {
            $remainingEvents = Event::where('type', $userType)
                ->where('id', '>', $event->id)
                ->exists();

            if (!$remainingEvents) {
                return redirect()->route('congrats'); 
            }
            $nextEvent = Event::where('id', '>', $event->id)
                ->where('type', $userType)
                ->first();

            return redirect()->route('showQuestions', $nextEvent);
        }

        $remainingEvents = Event::where('type', $userType)
            ->where('id', '>', $event->id)
            ->exists();

        if (!$remainingEvents && empty($questions)) {
            return redirect()->route('congrats'); 
        }

        return view('show_questions', compact('event', 'questions'));
    }




    public function submitAnswers(Request $request, Event $event)
    {
        $user = auth()->user();
        $answers = $request->input('user_answers');
        foreach ($answers as $questionId => $answer) {
            $question = Question::findOrFail($questionId);
            if ($question->answer === $answer) {
                $participant = EventParticipant::updateOrCreate(
                    ['event_id' => $event->id, 'user_id' => $user->id],
                    ['score' => EventParticipant::where('event_id', $event->id)
                        ->where('user_id', $user->id)
                        ->value('score') + 5]
                );
            }
        }

        $nextEvent = Event::where('id', '>', $event->id)
            ->where('type', $user->type)
            ->first();

        if ($nextEvent) {
            return redirect()->route('showQuestions', $nextEvent);
        } else {
            return redirect()->route('congrats');
        }
    }

    public function leaderboard()
    {
        $users = User::with(['participants' => function ($query) {
            $query->select('user_id', DB::raw('SUM(score) as total_score'))
                ->groupBy('user_id');
        }])
            ->has('participants')
            ->where('role', 'user')
            ->get();

        $leaderboard = $users->sortByDesc(function ($user) {
            return $user->participants->sum('total_score');
        });

        return view('leaderboard', compact('leaderboard'));
    }
    public function eventLeaderboard(Event $event)
    {
        $eventLeaderboard = $event->participants()->with('user')->orderByDesc('score')->get();

        return view('event_leaderboard', compact('event', 'eventLeaderboard'));
    }
}
