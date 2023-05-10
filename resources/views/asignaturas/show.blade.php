<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            {{ $asignatura->nombre }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-wrap gap-4">
        @forelse($asignatura->examenes as $examen)
        <div class="bg-white shadow-xl sm:rounded-lg p-4">
            <h3 class="text-lg">{{ $examen->nombre }}</h3>
            <a class="block bg-indigo-500 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-4 rounded mt-4"
                href="{{ route('examen',['id' => $examen->id]) }}">Hacer examen</a>
        </div>
        @empty
        <h3 class="text-xl">No hay examenes para esta asignatura</h3>
        @endforelse
    </div>

</x-app-layout>