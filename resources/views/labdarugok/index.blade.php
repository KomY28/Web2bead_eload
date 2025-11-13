<x-app-layout>
   
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Labdarúgók') }}
        </h2>
    </x-slot>

   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Név</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Klub (Tábla: klubok)</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Poszt (Tábla: posztok)</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Érték (ezer €)</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                          
                            @foreach ($labdarugok as $jatekos)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $jatekos->vezeteknev }} {{ $jatekos->utonev }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $jatekos->klub->csapatnev }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $jatekos->poszt->nev }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $jatekos->ertek }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>