<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Új Klub Létrehozása') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('klubok.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="csapatnev" class="block text-sm font-medium text-gray-700">Csapatnév</label>
                            <input type="text" name="csapatnev" id="csapatnev" value="{{ old('csapatnev') }}" required 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('csapatnev')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Mentés
                            </button>
                            <a href="{{ route('klubok.index') }}" class="ml-4 text-gray-600">Mégse</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>