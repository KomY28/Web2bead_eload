<x-app-layout>
   
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kapcsolat') }}
        </h2>
    </x-slot>

   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h3 class="text-2xl font-semibold mb-6">Küldjön nekünk üzenetet!</h3>

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600 bg-green-100 border border-green-300 rounded-md p-4">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('kapcsolat.store') }}" method="POST">
                        @csrf <div class="mb-4">
                            <label for="nev" class="block text-sm font-medium text-gray-700">Név</label>
                            <input type="text" name="nev" id="nev" value="{{ old('nev') }}" required 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('nev')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email cím</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('email')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="targy" class="block text-sm font-medium text-gray-700">Tárgy (nem kötelező)</label>
                            <input type="text" name="targy" id="targy" value="{{ old('targy') }}" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('targy')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="uzenet" class="block text-sm font-medium text-gray-700">Üzenet (min. 10 karakter)</label>
                            <textarea name="uzenet" id="uzenet" rows="5" required 
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('uzenet') }}</textarea>
                            @error('uzenet')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" 
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Küldés
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>