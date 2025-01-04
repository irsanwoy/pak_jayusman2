<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Pegawai') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('employee.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Nama</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="position" class="block text-gray-700">Posisi</label>
                            <input type="text" name="position" id="position" value="{{ old('position') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="branch_id" class="block text-gray-700">Cabang</label>
                            <input type="number" name="branch_id" id="branch_id" value="{{ old('branch_id') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>



                        <button type="submit" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
