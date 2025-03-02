<html>
    <style>
        .button1{

            display: inline-block;
                outline: 0;
                cursor: pointer;
                border: 2px solid #000;
                border-radius: 3px;
                color: #fff;
                background: #000;
                font-size: 20px;
                font-weight: 600;
                line-height: 28px;
                padding: 12px 20px;
                text-align:center;
                transition-duration: .15s;
                transition-property: all;
                transition-timing-function: cubic-bezier(.4,0,.2,1);
        }
        .button1:hover{
                    color: #000;
                    background: rgb(255, 218, 87);
                }
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
.container {
  max-width: fit-content;
  margin-left: auto;
  margin-right: auto;

}
.form-group{
    width:800px;
    margin:0 auto;
    display: flex;
  flex-direction: column;
}
.text{
    color:red ;
}

.link{
    cursor:pointer;
     color:blue;
     text-decoration:underline;
}

/* Toast Notification Styles */
.toast-notification {
    z-index: 50;
    pointer-events: none;
}

.toast-notification.show {
    animation: slideIn 0.3s ease-out forwards;
}

@keyframes slideIn {
    from {
        transform: translateY(100%);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

/* Share Button Styles */
.share-button {
    position: relative;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    border-radius: 0.375rem;
    transition: all 0.2s ease;
}

.share-button:hover {
    background-color: rgba(139, 92, 246, 0.1);
}

.share-button:active {
    transform: scale(0.98);
}

.fa-share-alt {
    transition: transform 0.2s ease;
}

.share-button:hover .fa-share-alt {
    transform: scale(1.1);
}

/* Add these button styles */
.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    padding: 0.625rem 1.25rem;
    font-weight: 600;
    font-size: 0.875rem;
    border-radius: 0.5rem;
    transition: all 0.2s ease;
    cursor: pointer;
    text-decoration: none;
    min-width: 200px;
    width: 150px;
    height: 42px;
}

.btn:hover {
    transform: translateY(-1px);
}

.btn:active {
    transform: translateY(0);
}

.btn-primary {
    background-color: #4F46E5;
    color: white;
    border: none;
}

.btn-primary:hover {
    background-color: #4338CA;
    box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.1);
}

.btn-success {
    background-color: #10B981;
    color: white;
    border: none;
}

.btn-success:hover {
    background-color: #059669;
    box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.1);
}

.btn-info {
    background-color: #6366F1;
    color: white;
    border: none;
}

.btn-info:hover {
    background-color: #4F46E5;
    box-shadow: 0 4px 6px -1px rgba(99, 102, 241, 0.1);
}

.btn-danger {
    background-color: #EF4444;
    color: white;
    border: none;
}

.btn-danger:hover {
    background-color: #DC2626;
    box-shadow: 0 4px 6px -1px rgba(239, 68, 68, 0.1);
}

.btn-group {
    display: flex;
    gap: 0.75rem;
    align-items: center;
    flex-wrap: wrap;
}

.btn i {
    font-size: 1rem;
}

.btn span {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
    </style>
</html>

<!-- Add this in the <head> or where you include your styles -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">
                <h2 class="text-xl font-semibold mb-4">Survey Analytics Dashboard</h2>
                <div class="flex flex-row justify-between gap-4">
                    <!-- Card 1: Total Questionnaires -->
                    <div class="flex-1 bg-white rounded-lg shadow-md border border-gray-200">
                        <div class="p-4 border-b text-center">
                            <div class="inline-flex items-center justify-center w-24 h-24 bg-blue-100 rounded-full mb-4">
                                <i class="fas fa-clipboard-list text-5xl text-blue-600"></i>
                            </div>
                        </div>
                        <div class="p-4 text-center">
                            <h3 class="text-lg font-medium text-gray-800 mb-2">Total Questionnaires</h3>
                            <p class="text-3xl font-bold text-blue-600">{{ $questionnaires->count() }}</p>
                        </div>
                    </div>

                    <!-- Card 2: Total Responses -->
                    <div class="flex-1 bg-white rounded-lg shadow-md border border-gray-200">
                        <div class="p-4 border-b text-center">
                            <div class="inline-flex items-center justify-center w-24 h-24 bg-green-100 rounded-full mb-4">
                                <i class="fas fa-poll text-5xl text-green-600"></i>
                            </div>
                        </div>
                        <div class="p-4 text-center">
                            <h3 class="text-lg font-medium text-gray-800 mb-2">Total Responses</h3>
                            <p class="text-3xl font-bold text-green-600">{{ $total_surveys }}</p>
                        </div>
                    </div>

                    <!-- Card 3: Average Responses -->
                    <div class="flex-1 bg-white rounded-lg shadow-md border border-gray-200">
                        <div class="p-4 border-b text-center">
                            <div class="inline-flex items-center justify-center w-24 h-24 bg-purple-100 rounded-full mb-4">
                                <i class="fas fa-chart-line text-5xl text-purple-600"></i>
                            </div>
                        </div>
                        <div class="p-4 text-center">
                            <h3 class="text-lg font-medium text-gray-800 mb-2">Average Responses</h3>
                            <p class="text-3xl font-bold text-purple-600">
                                {{ $questionnaires->count() > 0 ? round($total_surveys / $questionnaires->count(), 1) : 0 }}
                            </p>
                        </div>
                    </div>

                    <!-- Card 4: Response Rate -->
                    <div class="flex-1 bg-white rounded-lg shadow-md border border-gray-200">
                        <div class="p-4 border-b text-center">
                            <div class="inline-flex items-center justify-center w-24 h-24 bg-orange-100 rounded-full mb-4">
                                <i class="fas fa-percentage text-5xl text-orange-600"></i>
                            </div>
                        </div>
                        <div class="p-4 text-center">
                            <h3 class="text-lg font-medium text-gray-800 mb-2">Response Rate</h3>
                            <p class="text-3xl font-bold text-orange-600">
                                {{ $questionnaires->count() > 0 ? round(($total_surveys / $questionnaires->count()) * 100, 1) : 0 }}%
                            </p>
                        </div>
                    </div>
                </div>
            </div>

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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <p style="color: skyblue">My Questionnaires</p>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($questionnaires as $questionnaire)
                            <div class="border rounded p-4 hover:shadow-lg transition-shadow duration-200">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="text-lg font-semibold">{{ $questionnaire->title }}</h3>
                                        <p class="text-gray-600 mb-2">{{ $questionnaire->purpose }}</p>
                                    </div>
                                    <div class="bg-blue-50 px-3 py-1 rounded-full">
                                        <p class="text-sm text-blue-600 font-medium">
                                            {{ $questionnaire->total_responses }} Responses
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-4 flex gap-4 flex-wrap">
                                    <a href="{{ $questionnaire->path() }}"
                                       class="btn btn-info">
                                        <i class="fas fa-chart-bar"></i>
                                        <span>View Results</span>
                                    </a>
                                    <a href="{{ $questionnaire->publicPath() }}"
                                       class="btn btn-success"
                                       target="_blank">
                                        <i class="fas fa-poll"></i>
                                        <span>Answer Survey</span>
                                    </a>
                                    <button onclick="copyToClipboard('{{ $questionnaire->publicPath() }}', '{{ $questionnaire->id }}')"
                                            class="btn btn-primary">
                                        <i class="fas fa-share-alt"></i>
                                        <span class="copy-text">Share Survey</span>
                                    </button>
                                    <button onclick="toggleAnalytics('analytics-{{ $questionnaire->id }}')"
                                            class="btn btn-info">
                                        <i class="fas fa-chart-bar"></i>
                                        <span>View Analytics</span>
                                    </button>
                                    <form action="/questionnaires/{{ $questionnaire->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this questionnaire? This action cannot be undone.')">
                                            <i class="fas fa-trash"></i>
                                            <span>Delete</span>
                                        </button>
                                    </form>
                                </div>

                                <!-- Toast Notification -->
                                <div id="toast-{{ $questionnaire->id }}"
                                     class="fixed bottom-5 right-5 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg transform translate-y-full opacity-0 transition-all duration-300 flex items-center gap-2 z-50">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Survey link copied to clipboard!</span>
                                </div>

                                <!-- Progress bar showing response rate -->
                                <div class="mt-4">
                                    <div class="w-full bg-gray-200 rounded-full h-2.5 mb-1">
                                        @php
                                            $responseRate = $total_surveys > 0
                                                ? ($questionnaire->total_responses / $total_surveys * 100)
                                                : 0;
                                        @endphp
                                        <div class="bg-blue-600 h-2.5 rounded-full"
                                             style="width: {{ $responseRate }}%">
                                        </div>
                                    </div>
                                    <p class="text-xs text-gray-500">
                                        {{ round($responseRate, 1) }}% of total responses
                                    </p>
                                </div>

                                <!-- Analytics Section (Hidden by default) -->
                                <div id="analytics-{{ $questionnaire->id }}" class="hidden mt-4">
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <div class="flex justify-between items-center mb-4">
                                            <h4 class="text-xl font-semibold text-gray-800">Survey Responses</h4>
                                            <div class="bg-blue-50 px-3 py-1 rounded-full">
                                                <p class="text-sm text-blue-600 font-medium">
                                                    Total Responses: {{ $questionnaire->surveys->count() }}
                                                </p>
                                            </div>
                                        </div>

                                        @if($questionnaire->surveys->count() > 0)
                                            @foreach($questionnaire->surveys as $survey)
                                                <div class="bg-white p-6 rounded-lg shadow-sm mb-6 border border-gray-100">
                                                    <!-- Respondent Header -->
                                                    <div class="flex justify-between items-center mb-4 pb-3 border-b">
                                                        <div class="flex items-center gap-3">
                                                            <div class="bg-blue-100 p-2 rounded-full">
                                                                <i class="fas fa-user text-blue-600"></i>
                                                            </div>
                                                            <div>
                                                                <h5 class="text-lg font-semibold text-gray-800">{{ $survey->name }}</h5>
                                                                <p class="text-sm text-gray-600">{{ $survey->email }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="text-right">
                                                            <span class="text-sm text-gray-500">
                                                                Submitted on {{ $survey->created_at->format('M d, Y') }}
                                                            </span>
                                                            <p class="text-xs text-gray-400">
                                                                at {{ $survey->created_at->format('h:i A') }}
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <!-- Response Details -->
                                                    <div class="space-y-4">
                                                        @foreach($questionnaire->questions as $question)
                                                            <div class="bg-gray-50 p-4 rounded-lg">
                                                                <p class="font-medium text-gray-700 mb-2">
                                                                    <i class="fas fa-question-circle text-blue-500 mr-2"></i>
                                                                    {{ $question->question }}
                                                                </p>
                                                                @php
                                                                    $response = $survey->responses
                                                                        ->where('question_id', $question->id)
                                                                        ->first();
                                                                @endphp
                                                                @if($response && $response->answer)
                                                                    <div class="ml-6 mt-2 flex items-start">
                                                                        <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                                                        <p class="text-gray-600">{{ $response->answer->answer }}</p>
                                                                    </div>
                                                                @else
                                                                    <div class="ml-6 mt-2 flex items-start">
                                                                        <i class="fas fa-minus-circle text-gray-400 mt-1 mr-2"></i>
                                                                        <p class="text-gray-400">No answer provided</p>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="text-center py-8">
                                                <div class="bg-gray-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                                                    <i class="fas fa-inbox text-gray-400 text-2xl"></i>
                                                </div>
                                                <p class="text-gray-500 text-lg">No responses yet</p>
                                                <p class="text-gray-400 text-sm mt-1">Share your survey to start collecting responses</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- Add this JavaScript section at the bottom of your layout or view -->
<script>
    function copyToClipboard(text, questId) {
        const input = document.createElement('input');
        input.value = text;
        document.body.appendChild(input);
        input.select();
        document.execCommand('copy');
        document.body.removeChild(input);

        const button = event.target.closest('button');
        const toast = document.getElementById(`toast-${questId}`);

        toast.style.transform = 'translateY(0)';
        toast.style.opacity = '1';

        const copyText = button.querySelector('.copy-text');
        const originalText = copyText.textContent;
        copyText.textContent = 'Copied!';
        button.classList.remove('btn-primary');
        button.classList.add('btn-success');

        setTimeout(() => {
            toast.style.transform = 'translateY(100%)';
            toast.style.opacity = '0';
            copyText.textContent = originalText;
            button.classList.remove('btn-success');
            button.classList.add('btn-primary');
        }, 3000);
    }

    function toggleAnalytics(analyticsId) {
        const analyticsDiv = document.getElementById(analyticsId);
        const button = event.target.closest('button');
        const buttonText = button.querySelector('span');
        const buttonIcon = button.querySelector('i');

        if (analyticsDiv.classList.contains('hidden')) {
            analyticsDiv.classList.remove('hidden');
            buttonText.textContent = 'Hide Analytics';
            button.classList.remove('btn-info');
            button.classList.add('btn-danger');
            buttonIcon.classList.remove('fa-chart-bar');
            buttonIcon.classList.add('fa-times');
        } else {
            analyticsDiv.classList.add('hidden');
            buttonText.textContent = 'View Analytics';
            button.classList.remove('btn-danger');
            button.classList.add('btn-info');
            buttonIcon.classList.remove('fa-times');
            buttonIcon.classList.add('fa-chart-bar');
        }
    }
</script>

