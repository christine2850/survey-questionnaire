<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/questionnaires/view', 'App\Http\Controllers\QuestionnaireController@view');
Route::get('/questionnaires/create', 'App\Http\Controllers\QuestionnaireController@create');
Route::post('/questionnaires', 'App\Http\Controllers\QuestionnaireController@store');
Route::get('/questionnaires/{questionnaire}', 'App\Http\Controllers\QuestionnaireController@show');
Route::get('/questionnaires/{questionnaire}/edit', 'App\Http\Controllers\QuestionnaireController@edit');
Route::patch('/questionnaires/{questionnaire}', 'App\Http\Controllers\QuestionnaireController@update');
Route::delete('/questionnaires/{questionnaire}', 'App\Http\Controllers\QuestionnaireController@destroy');

Route::get('/questionnaires/{questionnaire}/questions/create', 'App\Http\Controllers\QuestionController@create');
Route::post('/questionnaires/{questionnaire}/questions', 'App\Http\Controllers\QuestionController@store');
Route::get('/questionnaires/{questionnaire}/questions/{question}/edit', 'App\Http\Controllers\QuestionController@edit');
Route::patch('/questionnaires/{questionnaire}/questions/{question}', 'App\Http\Controllers\QuestionController@update');
Route::delete('/questionnaires/{questionnaire}/questions/{question}', 'App\Http\Controllers\QuestionController@destroy');

Route::get('/surveys/{questionnaire}-{slug}', 'App\Http\Controllers\SurveyController@show')->name('surveys.show');
Route::post('/surveys/{questionnaire}-{slug}', 'App\Http\Controllers\SurveyController@store')->name('surveys.store');

require __DIR__.'/auth.php';
