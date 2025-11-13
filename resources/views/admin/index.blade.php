{{-- Ez az 'app' (bejelentkezett) keretet használja --}}
<x-app-layout>
    
    {{-- Ez a rész kerül a "header"-be --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Vezérlőpult') }}
        </h2>
    </x-slot>

    {{-- Ez a fő tartalom (a 'slot') --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Üdv az Admin felületen! Csak te láthatod ezt az oldalt.
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>