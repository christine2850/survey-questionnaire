<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Make sure user is authenticated
        if (!auth()->check()) {
            return redirect('/login');
        }

        $questionnaires = auth()->user()->questionnaires()->with([
            'questions.answers.responses',
            'questions.responses',
            'surveys'
        ])->get();

        $total_responses = $questionnaires->sum(function($questionnaire) {
            return $questionnaire->surveys()->count();
        });

        $analytics = [
            'total_questionnaires' => $questionnaires->count(),
            'total_responses' => $total_responses,
            'average_responses' => $questionnaires->count() > 0
                ? round($total_responses / $questionnaires->count(), 1)
                : 0,
            'response_rate' => $questionnaires->count() > 0
                ? round(($total_responses / $questionnaires->count()) * 100, 1)
                : 0
        ];

        return view('dashboard', compact('analytics', 'questionnaires'));
    }
}
