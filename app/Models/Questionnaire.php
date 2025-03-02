<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Questionnaire extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function path()
    {
        return url('/questionnaires/'.$this->id);
    }

    public function publicPath()
    {
        return url('/surveys/'.$this->id.'-'.$this->slug);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function surveys()
    {
        return $this->hasMany(Survey::class);
    }

    public function getTotalResponsesAttribute()
    {
        return $this->surveys()->count();
    }

    public function getResponsesPerQuestionAttribute()
    {
        $results = [];

        foreach($this->questions as $question) {
            $results[$question->question] = [
                'total' => $question->responses()->count(),
                'answers' => $question->answers->map(function($answer) {
                    return [
                        'answer' => $answer->answer,
                        'count' => $answer->responses()->count()
                    ];
                })
            ];
        }

        return $results;
    }

    public function getAnalyticsAttribute()
    {
        return [
            'total_responses' => $this->total_responses,
            'responses_per_question' => $this->responses_per_question,
        ];
    }

    public function getSlugAttribute()
    {
        return $this->attributes['slug'] ?? Str::slug($this->title);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($questionnaire) {
            $questionnaire->slug = Str::slug($questionnaire->title);
        });

        static::updating(function ($questionnaire) {
            if ($questionnaire->isDirty('title')) {
                $questionnaire->slug = Str::slug($questionnaire->title);
            }
        });
    }
}
