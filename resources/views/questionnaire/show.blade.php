<html>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .card-header1 {
            font-size: 40px;
            font-weight: bold;
            color: skyblue;
            text-align: center;
            margin-bottom: 20px;
        }
        .card-header2 {
            font-size: 24px;
            font-weight: 600;
            border-bottom: 3px solid #4F3C2A;
            padding: 10px;
            margin-bottom: 10px;
        }
        .card-body {
            font-size: 18px;
            font-weight: 500;
            padding: 10px;
            border-bottom: 3px solid #4F3C2A;
        }
        .choice {
            padding-left: 20px;
        }
        .perc {
            text-align: right;
        }
        .Add, .Take, .card-footer button {
            display: inline-block;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: 700;
            color: white;
            border-radius: 6px;
            transition: all 0.3s ease-in-out;
            width: 200px;
            min-width: 200px;
            text-align: center;
            text-decoration: none;
            margin: 5px;
            height: 42px;
            line-height: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .Add {
            background-color: #4299e1;
            border-bottom: 4px solid #2b6cb0;
        }
        .Add:hover {
            background-color: #2b6cb0;
            transform: scale(1.05);
        }
        .Take {
            background-color: #FF7C00;
            border-bottom: 4px solid #e66a00;
        }
        .Take:hover {
            background-color: #e66a00;
            transform: scale(1.05);
        }
        .card-footer button {
            background-color: #ff4742;
            border: 2px solid #ff4742;
        }
        .card-footer button:hover {
            background: white;
            color: #ff4742;
            transform: scale(1.05);
        }
        .button-group {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
            flex-wrap: wrap;
        }
        .list-group-item {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .line {
            height: 1px;
            background-color: #ddd;
            margin: 10px 0;
        }
        .text-center.mb-3 {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }
    </style>

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Dashboard') }}</h2>
        </x-slot>
        <div class="container">
            <div class="card-header1">{{ $questionnaire->title }}</div>
            <div class="text-center mb-3">
                <a class="Add" href="/questionnaires/{{ $questionnaire->id }}/questions/create">
                    <i class="fas fa-plus mr-2"></i><span>Add New Question</span>
                </a>
            </div>

            @foreach($questionnaire->questions as $question)
                <div class="card-header2">{{ $question->question }}</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($question->answers as $answer)
                            <li class="list-group-item">
                                <div class="choice">{{ $answer->answer }}</div>
                                @if($question->responses->count())
                                    <div class="perc">{{ intval(($answer->responses->count() * 100 / $question->responses->count())) }}%, {{ $answer->responses->count() }}</div>
                                @endif
                            </li>
                            <div class="line"></div>
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer text-center mt-3">
                    <div class="button-group">
                        <a href="/questionnaires/{{$questionnaire->id}}/questions/{{ $question->id }}/edit" class="Add">
                            <i class="fas fa-edit mr-2"></i><span>Edit Question</span>
                        </a>
                        <form action="/questionnaires/{{$questionnaire->id}}/questions/{{ $question->id }}" method="post" class="inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="Take" onclick="return confirm('Are you sure you want to delete this question?')">
                                <i class="fas fa-trash"></i> Delete Question
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </x-app-layout>
</html>
