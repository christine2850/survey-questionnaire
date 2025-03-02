<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
    <h3 class="text-lg font-semibold mb-4">Survey Analytics</h3>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div class="bg-gray-50 p-4 rounded">
            <h4 class="font-medium">Total Responses</h4>
            <p class="text-2xl font-bold">{{ $analytics['total_responses'] }}</p>
        </div>
    </div>

    <div class="space-y-6">
        @foreach($analytics['responses_per_question'] as $question => $data)
            <div class="border-t pt-4">
                <h4 class="font-medium mb-2">{{ $question }}</h4>
                <p class="text-sm text-gray-600 mb-2">Total responses: {{ $data['total'] }}</p>

                <div class="space-y-2">
                    @foreach($data['answers'] as $answer)
                        <div class="flex items-center">
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                @php
                                    $percentage = $data['total'] > 0 ? ($answer['count'] / $data['total'] * 100) : 0;
                                @endphp
                                <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $percentage }}%"></div>
                            </div>
                            <span class="ml-2 text-sm">
                                {{ $answer['answer'] }} ({{ $answer['count'] }})
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
