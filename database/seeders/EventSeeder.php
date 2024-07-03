<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Question;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define events and questions data
        $events = [

            [
                'name' => 'Math Quiz',
                'type' => 'individual',
                'category' => 'Education',
                'questions' => [
                    ['question' => 'What is 2 + 2?', 'answer' => '4'],
                    ['question' => 'Who is the author of "Theory of Relativity"?', 'answer' => 'Albert Einstein'],
                    ['question' => 'Solve for x: 3x + 5 = 20', 'answer' => 'x = 5'],
                ],
            ],
            [
                'name' => 'Chess Championship',
                'type' => 'individual',
                'category' => 'Gaming',
                'questions' => [
                    ['question' => 'What is a common opening move in chess?', 'answer' => 'Pawn to e4.'],
                    ['question' => 'Name the piece that can move diagonally.', 'answer' => 'Bishop'],
                    ['question' => 'How many squares are on a standard chessboard?', 'answer' => '64'],
                ],
            ],
            [
                'name' => 'Coding Challenge',
                'type' => 'individual',
                'category' => 'Technology',
                'questions' => [
                    ['question' => 'What does PHP stand for?', 'answer' => 'Hypertext Preprocessor'],
                    ['question' => 'Name a popular JavaScript framework.', 'answer' => 'React'],
                    ['question' => 'What is the main purpose of CSS?', 'answer' => 'Styling web pages'],
                ],
            ],
            [
                'name' => 'Science Fair',
                'type' => 'individual',
                'category' => 'Education',
                'questions' => [
                    ['question' => 'Name the chemical symbol for water.', 'answer' => 'h2o'],
                    ['question' => 'What is the boiling point of water in Celsius?', 'answer' => '100 degrees'],
                    ['question' => 'Who discovered penicillin?', 'answer' => 'Alexander Fleming'],
                ],
            ],
            [
                'name' => 'Basketball Tournament',
                'type' => 'team',
                'category' => 'Sports',
                'questions' => [
                    ['question' => 'How many players are on a basketball team?', 'answer' => '5'],
                    ['question' => 'What is the height of a basketball hoop in feet?', 'answer' => '10 feet'],
                    ['question' => 'Name a famous NBA player.', 'answer' => 'LeBron James'],
                ],
            ],

            [
                'name' => 'Art Competition',
                'type' => 'individual',
                'category' => 'Arts',
                'questions' => [
                    ['question' => 'Who painted the Mona Lisa?', 'answer' => 'Leonardo da Vinci'],
                    ['question' => 'Name a famous sculpture by Michelangelo.', 'answer' => 'David'],
                    ['question' => 'What art movement includes works like "Starry Night" by Vincent van Gogh?', 'answer' => 'Impressionism'],
                ],
            ],
            
        ];

        // Insert events and questions into database
        foreach ($events as $eventData) {
            $event = Event::create([
                'name' => $eventData['name'],
                'type' => $eventData['type'],
                'category' => $eventData['category'],
            ]);

            foreach ($eventData['questions'] as $questionData) {
                Question::create([
                    'event_id' => $event->id,
                    'question' => $questionData['question'],
                    'answer' => $questionData['answer'],
                ]);
            }
        }
    }
}
