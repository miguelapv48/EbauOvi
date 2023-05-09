<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            {{ __('Bienvenidos') }}
        </h2>
    </x-slot>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @foreach($preguntas as $pregunta)
        <div class="bg-white shadow-xl sm:rounded-lg p-4 mb-4">
            <h3 class="text-lg">{{ $pregunta->titulo }}</h3>
            @foreach($pregunta->respuestas as $respuesta)
            <label class="block mb-2"><input type="radio" name="pregunta_{{ $pregunta->id}}"> {{ $respuesta->respuesta }}</label>
            @endforeach

        </div>
        @endforeach
    </div>
</x-app-layout>