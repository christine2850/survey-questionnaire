@php
    use Illuminate\Support\Str;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $questionnaire->title }} - Survey</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4F46E5;
            --primary-hover: #4338CA;
            --background-color: #F3F4F6;
            --card-background: #FFFFFF;
            --text-primary: #111827;
            --text-secondary: #6B7280;
            --border-color: #E5E7EB;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: var(--background-color);
            color: var(--text-primary);
            line-height: 1.6;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            background: var(--card-background);
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 2rem;
        }

        .survey-header {
            text-align: center;
            margin-bottom: 2.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid var(--border-color);
        }

        .survey-title {
            font-size: 2.25rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.75rem;
        }

        .survey-purpose {
            font-size: 1.1rem;
            color: var(--text-secondary);
            max-width: 600px;
            margin: 0 auto;
        }

        .question-group {
            background: #F9FAFB;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border: 1px solid var(--border-color);
        }

        .question-text {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--text-primary);
        }

        .answers-group {
            display: grid;
            gap: 0.75rem;
        }

        .answer-option {
            position: relative;
            padding: 0.75rem;
            background: white;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .answer-option:hover {
            border-color: var(--primary-color);
            background: #F5F7FF;
        }

        .answer-option input[type="radio"] {
            position: absolute;
            opacity: 0;
        }

        .answer-option label {
            display: flex;
            align-items: center;
            cursor: pointer;
            padding-left: 2rem;
            position: relative;
        }

        .answer-option label::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            border: 2px solid var(--border-color);
            border-radius: 50%;
            transition: all 0.2s ease;
        }

        .answer-option input[type="radio"]:checked + label::before {
            border-color: var(--primary-color);
            background: var(--primary-color);
            box-shadow: inset 0 0 0 4px white;
        }

        .form-section {
            margin-top: 2.5rem;
            padding-top: 2rem;
            border-top: 2px solid var(--border-color);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: var(--text-primary);
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.2s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .submit-button {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 1rem 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            transition: all 0.2s ease;
        }

        .submit-button:hover {
            background: var(--primary-hover);
            transform: translateY(-1px);
        }

        .submit-button:active {
            transform: translateY(0);
        }

        @media (max-width: 640px) {
            .container {
                padding: 1.5rem;
                margin: 20px auto;
            }

            .survey-title {
                font-size: 1.75rem;
            }

            .question-group {
                padding: 1rem;
            }

            .question-text {
                font-size: 1.1rem;
            }
        }

        /* Error states */
        .form-group input:invalid {
            border-color: #EF4444;
        }

        .error-text {
            color: #EF4444;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        /* Loading state */
        .submit-button.loading {
            opacity: 0.7;
            cursor: not-allowed;
        }

        /* Success message */
        .success-message {
            background: #DEF7EC;
            color: #03543F;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="survey-header">
            <h1 class="survey-title">{{ $questionnaire->title }}</h1>
            <p class="survey-purpose">{{ $questionnaire->purpose }}</p>
        </div>

        <form action="{{ route('surveys.store', ['questionnaire' => $questionnaire->id, 'slug' => $questionnaire->slug]) }}" method="POST" id="surveyForm">
            @csrf

            @foreach($questionnaire->questions as $key => $question)
                <div class="question-group">
                    <h2 class="question-text">{{ $key + 1 }}. {{ $question->question }}</h2>
                    <div class="answers-group">
                        <input type="hidden" name="responses[{{ $key }}][question_id]" value="{{ $question->id }}">
                        @foreach($question->answers as $answer)
                            <div class="answer-option">
                                <input type="radio"
                                       id="answer{{ $question->id }}_{{ $answer->id }}"
                                       name="responses[{{ $key }}][answer_id]"
                                       value="{{ $answer->id }}"
                                       required>
                                <label for="answer{{ $question->id }}_{{ $answer->id }}">{{ $answer->answer }}</label>
                            </div>
                        @endforeach
                    </div>
                    @error('responses.' . $key . '.answer_id')
                        <p class="error-text">{{ $message }}</p>
                    @enderror
                </div>
            @endforeach

            <div class="form-section">
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="survey[name]" value="{{ old('survey.name') }}" required placeholder="Enter your name">
                    @error('survey.name')
                        <p class="error-text">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Your Email</label>
                    <input type="email" id="email" name="survey[email]" value="{{ old('survey.email') }}" required placeholder="Enter your email">
                    @error('survey.email')
                        <p class="error-text">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="submit-button" id="submitButton">
                    <span>Submit Survey</span>
                </button>
            </div>
        </form>
    </div>

    <script>
        // Form submission handling
        document.getElementById('surveyForm').addEventListener('submit', function(e) {
            const button = document.getElementById('submitButton');
            button.classList.add('loading');
            button.innerHTML = 'Submitting...';
        });

        // Radio button enhancement
        document.querySelectorAll('.answer-option').forEach(option => {
            option.addEventListener('click', function(e) {
                const radio = this.querySelector('input[type="radio"]');
                radio.checked = true;
            });
        });
    </script>
</body>
</html>
