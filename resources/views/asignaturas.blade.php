<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bienvenidos') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 flex gap-4">
        @foreach($asignaturas as $asignatura)
        <div class="bg-white shadow-xl sm:rounded-lg p-4">
            <h3 class="text-lg">{{ $asignatura->nombre }}</h3>
            <a class="block bg-indigo-500 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-4 rounded mt-4" href="{{ route('examenes',['id' =>$asignatura->id]) }}">Ver examenes</a>
        </div>
        @endforeach
    </div>
</x-app-layout>