<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Question</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .button-33 {
            background-color: #c2fbd7;
            border-radius: 100px;
            box-shadow: rgba(44, 187, 99, .2) 0 -25px 18px -14px inset,
                        rgba(44, 187, 99, .15) 0 1px 2px,
                        rgba(44, 187, 99, .15) 0 2px 4px,
                        rgba(44, 187, 99, .15) 0 4px 8px,
                        rgba(44, 187, 99, .15) 0 8px 16px,
                        rgba(44, 187, 99, .15) 0 16px 32px;
            color: green;
            cursor: pointer;
            font-family: 'Roboto', sans-serif;
            padding: 10px 25px;
            font-size: 16px;
            transition: all 250ms;
            border: none;
        }

        .button-33:hover {
            box-shadow: rgba(44, 187, 99, .35) 0 -25px 18px -14px inset,
                        rgba(44, 187, 99, .25) 0 1px 2px,
                        rgba(44, 187, 99, .25) 0 2px 4px,
                        rgba(44, 187, 99, .25) 0 4px 8px,
                        rgba(44, 187, 99, .25) 0 8px 16px,
                        rgba(44, 187, 99, .25) 0 16px 32px;
            transform: scale(1.05);
        }

        .button-cancel {
            background-color: #ff4742;
            border-radius: 100px;
            color: white;
            cursor: pointer;
            font-family: 'Roboto', sans-serif;
            padding: 10px 25px;
            font-size: 16px;
            transition: all 250ms;
            border: none;
            text-decoration: none;
            display: inline-block;
            margin-left: 10px;
        }

        .button-cancel:hover {
            background-color: #d63030;
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gray-100 p-6">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="max-w-4xl mx-auto bg-white p-6 shadow-md rounded-lg mt-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Edit Question</h2>

            <form action="/questionnaires/{{ $questionnaire->id }}/questions/{{ $question->id }}" method="post">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <label for="question" class="block text-gray-700 font-semibold">Question</label>
                    <input type="text"
                           name="question[question]"
                           id="question"
                           class="w-full p-2 border rounded-md"
                           value="{{ old('question.question', $question->question) }}"
                           required>
                    <small class="text-gray-500">Ask simple and to-the-point questions.</small>
                    @error('question.question')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <fieldset class="mb-4">
                    <legend class="text-lg font-semibold text-gray-700">Choices</legend>
                    <small class="text-gray-500">Give choices that provide the most insight.</small>

                    <div id="answers">
                        @foreach($question->answers as $key => $answer)
                            <div class="mt-2">
                                <label for="answer{{ $key + 1 }}" class="block text-gray-700 font-semibold">
                                    Choice {{ $key + 1 }}
                                </label>
                                <input type="text"
                                       name="answers[{{ $key }}][answer]"
                                       id="answer{{ $key + 1 }}"
                                       class="w-full p-2 border rounded-md"
                                       value="{{ old('answers.'.$key.'.answer', $answer->answer) }}"
                                       required>
                                @error('answers.'.$key.'.answer')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                        @endforeach
                    </div>
                </fieldset>

                <div class="flex items-center">
                    <button type="submit" class="button-33">Update Question</button>
                    <a href="/questionnaires/{{ $questionnaire->id }}" class="button-cancel">Cancel</a>
                </div>
            </form>
        </div>
    </x-app-layout>
</body>
</html>
