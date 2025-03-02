<html>
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
            text-align: center;
            font-size: 16px;
            border: 0;
            transition: all 250ms;
            user-select: none;
        }

        .button-33:hover {
            box-shadow: rgba(44,187,99,.35) 0 -25px 18px -14px inset,
                        rgba(44,187,99,.25) 0 1px 2px,
                        rgba(44,187,99,.25) 0 2px 4px,
                        rgba(44,187,99,.25) 0 4px 8px,
                        rgba(44,187,99,.25) 0 8px 16px,
                        rgba(44,187,99,.25) 0 16px 32px;
            transform: scale(1.05) rotate(-1deg);
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .text {
            color: red;
            font-size: 14px;
        }

        .card-header {
            font-size: 20px;
            font-weight: bold;
            color: skyblue;
            padding: 10px;
            text-align: center;
            border-bottom: 2px solid #ddd;
        }

        .card-body {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</html>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <div class="card-header">Create New Questionnaire</div>

                <div class="card-body">
                    <form action="/questionnaires" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input name="title" type="text" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Enter Title">
                            <small id="titleHelp" class="form-text text-muted">Give your questionnaire a title that attracts attention.</small>

                            @error('title')
                                <small class="text">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="purpose">Purpose</label>
                            <input name="purpose" type="text" class="form-control" id="purpose" aria-describedby="purposeHelp" placeholder="Enter Purpose">
                            <small id="purposeHelp" class="form-text text-muted">Giving a purpose will increase responses.</small>

                            @error('purpose')
                                <small class="text">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="button-33">Create Questionnaire</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
