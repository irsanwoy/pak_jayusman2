<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Transaction Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Form untuk membuat detail transaksi baru -->
                    <form action="{{ route('transactionDetail.store') }}" method="POST" class="space-y-6">
                        @csrf

                
                        <div>
                            <label for="product_id" class="block text-sm font-medium text-gray-700">Product</label>
                            <select name="product_id" id="product_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                <option value="" data-price="0">-- Select Product --</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                        {{ $product->product_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mt-4">
                            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                            <input type="number" id="quantity" name="quantity" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" min="1" value="1">
                        </div>
                        
                        <div class="mt-4">
                            <label for="total_price" class="block text-sm font-medium text-gray-700">Total Price</label>
                            <input type="text" id="total_price" name="total_price" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" readonly>
                        </div>
                        
                        
                        
                     
                        <!-- Price (Auto-filled) -->
                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                            <input type="number" name="price" id="price" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" readonly>
                        </div>

                        <!-- Tombol Simpan -->
                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('transactionDetail.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Cancel</a>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Mengisi harga otomatis saat produk dipilih
        document.getElementById('product_id').addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            const price = selectedOption.getAttribute('data-price');
            document.getElementById('price').value = price ? price : '';
        }),
        document.addEventListener('DOMContentLoaded', function () {
        const productSelect = document.getElementById('product_id');
        const quantityInput = document.getElementById('quantity');
        const totalPriceInput = document.getElementById('total_price');

        function calculateTotal() {
            const selectedOption = productSelect.options[productSelect.selectedIndex];
            const price = parseFloat(selectedOption.getAttribute('data-price')) || 0;
            const quantity = parseInt(quantityInput.value) || 1;
            const totalPrice = price * quantity;
            totalPriceInput.value = totalPrice.toFixed(2); // Format to 2 decimal places
        }

        // Event listeners for changes
        productSelect.addEventListener('change', calculateTotal);
        quantityInput.addEventListener('input', calculateTotal);
    });
    </script>
</x-app-layout>
