<?php

namespace App\Http\Controllers;

class QuestionnaireController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function create()
    {
        return view('questionnaire.create');
    }

    public function view()
    {
        $questionnaires = auth()->user()->questionnaires()->with([
            'questions.answers',
            'questions.responses',
            'surveys.responses.answer',
            'surveys.responses.question'
        ])->get();
        $total_surveys = $questionnaires->sum('total_responses');

        return view('questionnaire.view', compact('questionnaires', 'total_surveys'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'purpose' => 'required',
        ]);

        // $data['user_id'] = auth()->user()->id;

        // $questionnaire = \App\Models\Questionnaire::create($data);

        $questionnaire = auth()->user()->questionnaires()->create($data);

        return redirect('/questionnaires/'.$questionnaire->id);
    }

    public function show(\App\Models\Questionnaire $questionnaire)
    {
        $questionnaire->load([
            'questions.answers.responses',
            'surveys'
        ]);
        $analytics = $questionnaire->analytics;

        return view('questionnaire.show', compact('questionnaire', 'analytics'));
    }

    public function edit(\App\Models\Questionnaire $questionnaire)
    {
        return view('questionnaire.edit', compact('questionnaire'));
    }

    public function update(\App\Models\Questionnaire $questionnaire)
    {
        $data = request()->validate([
            'title' => 'required',
            'purpose' => 'required',
        ]);

        $questionnaire->update($data);

        return redirect('/questionnaires/'.$questionnaire->id)->with('success', 'Questionnaire updated successfully!');
    }

    public function destroy(\App\Models\Questionnaire $questionnaire)
    {
        // Delete related questions and their answers
        foreach ($questionnaire->questions as $question) {
            $question->answers()->delete();
            $question->delete();
        }

        // Delete related surveys and responses
        foreach ($questionnaire->surveys as $survey) {
            $survey->responses()->delete();
            $survey->delete();
        }

        $questionnaire->delete();

        return redirect('/questionnaires/view')->with('success', 'Questionnaire deleted successfully!');
    }
}
