<?php

namespace App\Http\Controllers;

class QuestionController extends Controller
{
    public function create(\App\Models\Questionnaire $questionnaire)
    {
        return view('question.create', compact('questionnaire'));
    }

    public function store(\App\Models\Questionnaire $questionnaire)
    {
        // dd(request()->all());

        $data = request()->validate([
            'question.question' => 'required',
            'answers.*.answer' => 'required',
        ]);

        $question = $questionnaire->questions()->create($data['question']);
        $question->answers()->createMany($data['answers']);

        return redirect('/questionnaires/'.$questionnaire->id);
    }

    public function destroy(\App\Models\Questionnaire $questionnaire, \App\Models\Question $question)
    {
        $question->answers()->delete();
        $question->delete();

        return redirect($questionnaire->path());
    }

    public function edit(\App\Models\Questionnaire $questionnaire, \App\Models\Question $question)
    {
        // Ensure the question belongs to the questionnaire
        if ($question->questionnaire_id !== $questionnaire->id) {
            return redirect()->back()->with('error', 'Unauthorized access');
        }

        $question->load('answers');
        return view('question.edit', compact('questionnaire', 'question'));
    }

    public function update(\App\Models\Questionnaire $questionnaire, \App\Models\Question $question)
    {
        // Ensure the question belongs to the questionnaire
        if ($question->questionnaire_id !== $questionnaire->id) {
            return redirect()->back()->with('error', 'Unauthorized access');
        }

        $data = request()->validate([
            'question.question' => 'required',
            'answers.*.answer' => 'required',
        ]);

        try {
            \DB::beginTransaction();

            // Update the question
            $question->update($data['question']);

            // Update or create answers
            foreach ($data['answers'] as $key => $answerData) {
                if (isset($question->answers[$key])) {
                    $question->answers[$key]->update($answerData);
                } else {
                    $question->answers()->create($answerData);
                }
            }

            // Delete any remaining old answers that weren't updated
            if (count($data['answers']) < $question->answers->count()) {
                $question->answers()->where('id', '>', count($data['answers']))->delete();
            }

            \DB::commit();
            return redirect('/questionnaires/'.$questionnaire->id)->with('success', 'Question updated successfully!');
        } catch (\Exception $e) {
            \DB::rollBack();
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Failed to update question. Please try again.']);
        }
    }
}
