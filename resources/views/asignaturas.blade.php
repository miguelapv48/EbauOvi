<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bienvenidos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @foreach($asignaturas as $asignatura)
                    <a href="{{ route('tessts',$asignatura->id) }}">{{ $asignatura->nombre }}</a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
