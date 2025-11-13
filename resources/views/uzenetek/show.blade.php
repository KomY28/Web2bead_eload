<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Üzenet megtekintése') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="border-b pb-4 mb-4">
                        <h3 class="text-2xl font-semibold mb-2">{{ $uzenet->targy }}</h3>
                        
                        <div class="text-sm text-gray-600">
                            <strong>Küldő:</strong> {{ $uzenet->kuldo->name }} ({{ $uzenet->kuldo->email }})
                        </div>
                        <div class="text-sm text-gray-600">
                            <strong>Címzett:</strong> {{ $uzenet->cimzett->name }} ({{ $uzenet->cimzett->email }})
                        </div>
                        <div class="text-sm text-gray-600">
                            <strong>Dátum:</strong> {{ $uzenet->created_at->format('Y. m. d. H:i') }}
                        </div>
                        
                        @if($uzenet->olvasva_ekkor)
                        <div class="text-sm text-green-600 mt-1">
                            <strong>Olvasva:</strong> {{ $uzenet->olvasva_ekkor->format('Y. m. d. H:i') }}
                        </div>
                        @endif
                    </div>

                    <div class="prose max-w-none">
                        {{-- A nl2br() funkció megtartja a sortöréseket --}}
                        {!! nl2br(e($uzenet->tartalom)) !!}
                    </div>

                    <div class="mt-6 border-t pt-4">
                        <a href="{{ route('uzenetek.index') }}" class="text-gray-600">Vissza a postafiókhoz</a>
                        
                        {{-- Később ide jöhet a "Törlés" gomb --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>