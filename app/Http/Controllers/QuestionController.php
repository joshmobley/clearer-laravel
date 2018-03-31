<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Question;
use App\Project;

class QuestionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('teamSubscribed');
    }
    //
    public function show(Question $question) {
        $currentUser = Auth::user();
        return view('question.show', compact(['question', 'currentUser']));
    }

    public function create(Project $project) {
        return view('question.create', compact(['project']));
    }

    public function store(Project $project) {
       $question = new Question;
       $question->title = request('question');
       $question->description = request('description');
       $question->time_due = request('due_date');
       $question->owner_id = Auth::user()->id;
       $question->project_id = $project->id;
       $question->save();
       return redirect()->route('project.show', [$project->id]);
    }
}
