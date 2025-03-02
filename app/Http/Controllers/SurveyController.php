<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
    public function show(\App\Models\Questionnaire $questionnaire, $slug)
    {
        if ($questionnaire->slug !== $slug) {
            return redirect($questionnaire->publicPath());
        }

        $questionnaire->load('questions.answers');

        return view('survey.show', compact('questionnaire'));
    }

    public function store(\App\Models\Questionnaire $questionnaire)
    {
        try {
            $data = request()->validate([
                'responses.*.answer_id' => 'required',
                'responses.*.question_id' => 'required',
                'survey.name' => 'required',
                'survey.email' => 'required|email',
            ]);

            DB::beginTransaction();

            $survey = $questionnaire->surveys()->create($data['survey']);
            $survey->responses()->createMany($data['responses']);

            DB::commit();

            return view('survey.thankyou', ['name' => $data['survey']['name']]);
        } catch (\Exception $e) {
            DB::rollBack();

            return back()
                ->withInput()
                ->withErrors(['error' => 'There was a problem submitting your survey. Please try again.']);
        }
    }
}
