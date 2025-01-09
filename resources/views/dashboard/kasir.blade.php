<x-app-layout>
    <div class="container mx-auto p-6 bg-gray-100 dark:bg-gray-900 rounded shadow-lg">
        <h1 class="text-3xl font-extrabold text-center text-gray-800 dark:text-white mb-6">Dashboard Kasir</h1>

        <!-- Form for Transactions -->
        <form method="POST" action="{{ route('transaction.store') }}" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            @csrf

            <!-- Product Input -->
            <div class="mb-4">
                <label for="product" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Product</label>
                <input 
                    type="text" 
                    name="product" 
                    id="product" 
                    class="form-input mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                    placeholder="Enter product name"
                    required>
            </div>

            <!-- Amount Input -->
            <div class="mb-4">
                <label for="amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Amount</label>
                <input 
                    type="number" 
                    name="amount" 
                    id="amount" 
                    class="form-input mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                    placeholder="Enter amount"
                    required>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button 
                    type="submit" 
                    class="bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-indigo-600 hover:to-blue-500 text-white px-6 py-2 rounded-lg shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Submit Transaction
                </button>
            </div>
        </form>

        <!-- Additional Features: Recent Transactions -->
        <div class="mt-8">
            <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Recent Transactions</h2>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                <table class="table-auto w-full text-left text-gray-700 dark:text-gray-300">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Product</th>
                            <th class="px-4 py-2">Amount</th>
                            <th class="px-4 py-2">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">Product A</td>
                            <td class="px-4 py-2">3</td>
                            <td class="px-4 py-2">2023-12-01</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2">2</td>
                            <td class="px-4 py-2">Product B</td>
                            <td class="px-4 py-2">5</td>
                            <td class="px-4 py-2">2023-12-02</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
