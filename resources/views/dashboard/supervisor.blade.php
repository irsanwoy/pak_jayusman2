<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-8 text-center">Dashboard Supervisor</h1>

        <!-- Team Performance Section -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 mb-6">
            <h2 class="text-2xl font-semibold text-blue-600 dark:text-blue-400 mb-4">Team Performance</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="p-4 bg-blue-50 dark:bg-gray-700 rounded-lg flex items-center">
                    <div class="flex-shrink-0 text-blue-500 text-4xl mr-4">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium">Kasir 1</h3>
                        <p class="text-gray-600 dark:text-gray-300">50 transactions</p>
                    </div>
                </div>
                <div class="p-4 bg-blue-50 dark:bg-gray-700 rounded-lg flex items-center">
                    <div class="flex-shrink-0 text-blue-500 text-4xl mr-4">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium">Kasir 2</h3>
                        <p class="text-gray-600 dark:text-gray-300">40 transactions</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stock Alerts Section -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-red-600 dark:text-red-400 mb-4">Stock Alerts</h2>
            <table class="w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-700 text-left">
                        <th class="p-4 text-gray-700 dark:text-gray-300">Product</th>
                        <th class="p-4 text-gray-700 dark:text-gray-300">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-gray-200 dark:border-gray-600">
                        <td class="p-4">Product A</td>
                        <td class="p-4 text-yellow-500">Low Stock</td>
                    </tr>
                    <tr>
                        <td class="p-4">Product B</td>
                        <td class="p-4 text-red-500">Out of Stock</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
