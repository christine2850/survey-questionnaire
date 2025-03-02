<html>
    <!-- Add Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .button-44 {
  background: #13D100 ;
  border-radius: 11px;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: flex;
  font-family: Mija,-apple-system,BlinkMacSystemFont,Roboto,"Roboto Slab","Droid Serif","Segoe UI",system-ui,Arial,sans-serif;
  font-size: 1.15em;
  font-weight: 700;
  justify-content: center;
  line-height: 33.4929px;
  padding: .8em 1em;
  text-align: center;
  text-decoration: none;
  text-decoration-skip-ink: auto;
  text-shadow: rgba(0, 0, 0, .3) 1px 1px 1px;
  text-underline-offset: 1px;
  transition: all .2s ease-in-out;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  width: 100%;
  word-break: break-word;
  border: 0;
}

.button-44:active,
.button-44:focus {
  border-bottom-style: none;
  border-color: #dadada;
  box-shadow: rgba(0, 0, 0, .3) 0 3px 3px inset;
  outline: 0;
}

.button-44:hover {
  border-bottom-style: none;
  border-color: #dadada;
}
.button-45 {
  background: #FF7C00;
  border-radius: 11px;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: flex;
  font-family: Mija,-apple-system,BlinkMacSystemFont,Roboto,"Roboto Slab","Droid Serif","Segoe UI",system-ui,Arial,sans-serif;
  font-size: 1.15em;
  font-weight: 700;
  justify-content: center;
  line-height: 33.4929px;
  padding: .8em 1em;
  text-align: center;
  text-decoration: none;
  text-decoration-skip-ink: auto;
  text-shadow: rgba(0, 0, 0, .3) 1px 1px 1px;
  text-underline-offset: 1px;
  transition: all .2s ease-in-out;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  width: 100%;
  word-break: break-word;
  border: 0;
}

.button-45:active,
.button-45:focus {
  border-bottom-style: none;
  border-color: #dadada;
  box-shadow: rgba(0, 0, 0, .3) 0 3px 3px inset;
  outline: 0;
}

.button-45:hover {
  border-bottom-style: none;
  border-color: #dadada;
}
    </style>
</html>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Analytics Dashboard -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">
                <div class="text-center mb-6">
                    <div class="inline-flex items-center justify-center w-24 h-24 bg-gray-100 rounded-full mb-4">
                        <i class="fas fa-chart-pie text-6xl text-gray-600"></i>
                    </div>
                    <h2 class="text-2xl font-semibold">Analytics Summary</h2>
                </div>
                <div class="flex flex-row justify-between gap-4">
                    <!-- Card 1: Total Questionnaires -->
                    <div class="flex-1 bg-white rounded-lg shadow-md border border-gray-200">
                        <div class="p-4 border-b text-center">
                            <div class="inline-flex items-center justify-center w-32 h-32 bg-blue-100 rounded-full mb-4">
                                <i class="fas fa-clipboard-list text-8xl text-blue-600"></i>
                            </div>
                        </div>
                        <div class="p-4 text-center">
                            <h3 class="text-lg font-medium text-gray-800 mb-2">Total Questionnaires</h3>
                            <p class="text-4xl font-bold text-blue-600">{{ $analytics['total_questionnaires'] }}</p>
                        </div>
                    </div>

                    <!-- Card 2: Total Responses -->
                    <div class="flex-1 bg-white rounded-lg shadow-md border border-gray-200">
                        <div class="p-4 border-b text-center">
                            <div class="inline-flex items-center justify-center w-32 h-32 bg-green-100 rounded-full mb-4">
                                <i class="fas fa-poll text-8xl text-green-600"></i>
                            </div>
                        </div>
                        <div class="p-4 text-center">
                            <h3 class="text-lg font-medium text-gray-800 mb-2">Total Responses</h3>
                            <p class="text-4xl font-bold text-green-600">{{ $analytics['total_responses'] }}</p>
                        </div>
                    </div>

                    <!-- Card 3: Average Responses -->
                    <div class="flex-1 bg-white rounded-lg shadow-md border border-gray-200">
                        <div class="p-4 border-b text-center">
                            <div class="inline-flex items-center justify-center w-32 h-32 bg-purple-100 rounded-full mb-4">
                                <i class="fas fa-chart-line text-8xl text-purple-600"></i>
                            </div>
                        </div>
                        <div class="p-4 text-center">
                            <h3 class="text-lg font-medium text-gray-800 mb-2">Average Responses</h3>
                            <p class="text-4xl font-bold text-purple-600">{{ $analytics['average_responses'] }}</p>
                        </div>
                    </div>

                    <!-- Card 4: Response Rate -->
                    <div class="flex-1 bg-white rounded-lg shadow-md border border-gray-200">
                        <div class="p-4 border-b text-center">
                            <div class="inline-flex items-center justify-center w-32 h-32 bg-orange-100 rounded-full mb-4">
                                <i class="fas fa-percentage text-8xl text-orange-600"></i>
                            </div>
                        </div>
                        <div class="p-4 text-center">
                            <h3 class="text-lg font-medium text-gray-800 mb-2">Response Rate</h3>
                            <p class="text-4xl font-bold text-orange-600">{{ $analytics['response_rate'] }}%</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <p style="color: skyblue">Create New Questionnaire</p>
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <a href="/questionnaires/create" class="button-44">
                        Create New Questionnaire
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <p style="color: skyblue">My Questionnaires</p>
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <a href="/questionnaires/view" class="button-45" role="button">
                        View My Questionnaires
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


