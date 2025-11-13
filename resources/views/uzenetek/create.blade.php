<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Új üzenet írása') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('uzenetek.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="cimzett_id" class="block text-sm font-medium text-gray-700">Címzett</label>
                            <select name="cimzett_id" id="cimzett_id" required 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">-- Válassz címzettet --</option>
                                
                                {{-- A Controllerből kapott felhasználók betöltése --}}
                                @foreach ($cimzettek as $cimzett)
                                    <option value="{{ $cimzett->id }}" {{ old('cimzett_id') == $cimzett->id ? 'selected' : '' }}>
                                        {{ $cimzett->name }} ({{ $cimzett->email }})
                                    </option>
                                @endforeach
                            </select>
                            
                            @error('cimzett_id')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="targy" class="block text-sm font-medium text-gray-700">Tárgy</label>
                            <input type="text" name="targy" id="targy" value="{{ old('targy') }}" required 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('targy')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="tartalom" class="block text-sm font-medium text-gray-700">Üzenet (min. 5 karakter)</label>
                            <textarea name="tartalom" id="tartalom" rows="5" required 
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('tartalom') }}</textarea>
                            @error('tartalom')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" 
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Küldés
                            </button>
                            <a href="{{ route('uzenetek.index') }}" class="ml-4 text-gray-600">Mégse</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>