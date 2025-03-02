<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <h1 class="text-2xl font-semibold">{{ $questionnaire->title }}</h1>
                <p class="text-gray-600">{{ $questionnaire->purpose }}</p>
            </div>

            <!-- Analytics Section -->
            <div class="mb-8">
                <x-survey-analytics :analytics="$analytics" />
            </div>

            <!-- Existing questionnaire content -->
            <!-- ... -->
        </div>
    </div>
</x-app-layout>
