<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-8 text-center">Dashboard Supervisor</h1>

        <!-- Team Performance Section -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 mb-6">
            <h2 class="text-2xl font-semibold text-blue-600 dark:text-blue-400 mb-4">Team Performance</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($teamPerformance as $performance)
                    <div class="p-4 bg-blue-50 dark:bg-gray-700 rounded-lg flex items-center">
                        <div class="flex-shrink-0 text-blue-500 text-4xl mr-4">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium">{{ $performance->employee->name }}</h3>
                            <p class="text-gray-600 dark:text-gray-300">
                                {{ $performance->transaction_count }} transactions
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        
    </div>
</x-app-layout>
