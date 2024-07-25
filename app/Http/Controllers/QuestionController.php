<?php
namespace App\Http\Controllers;

use App\Models\QuestionAnswerRecord;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class QuestionController extends Controller
{
    // Method to load the view for questions and answers
    public function questAnswer()
    {
        $questions = Answer::all(); 
        $title = "Questions and Answers";
        return view('pages.questAnswer', compact('title', 'questions'));
    }

    // Method to fetch questions and their answers
    public function index()
    {
        $questions = Answer::paginate(10);
        return view('questions.index', compact('questions'));
    }

    // Method to handle uploading of questions and answers via Excel
    public function store(Request $request)
    {
        $request->validate([
            'questions' => 'required|mimes:xlsx',
            'answers' => 'required|mimes:xlsx',
        ]);

        // Process the Excel files
        $questions = Excel::toCollection(null, $request->file('questions'));
        $answers = Excel::toCollection(null, $request->file('answers'));

        // Iterate through each question row and create Question and Answer models
        foreach ($questions[0] as $questionRow) {
            // Create the Question model
            $question = Question::create([
                'question' => $questionRow[0],
                // add other necessary fields for the Question model
            ]);

            $answerRow = $answers[0]->firstWhere(0, $questionRow[0]);

            if ($answerRow) {
                Answer::create([
                    'question_id' => $question->id,// Use the created question's ID
                   
                    'answer' => $answerRow[1],
                    'score' => intval($answerRow[2]), // Ensure score is an integer
                ]);
            
            }
        }

        return redirect()->route('questions.index')->with('success', 'Questions and answers uploaded successfully.');
    }
}
