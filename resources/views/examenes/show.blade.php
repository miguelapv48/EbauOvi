<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            {{ $examen->nombre }}
        </h2>
    </x-slot>
    <form class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @csrf
        @foreach($examen->preguntas as $pregunta)
        <div class="bg-white shadow-xl sm:rounded-lg p-4 mb-4">
            <h3 class="text-lg">{{ $pregunta->titulo }}</h3>
            @foreach($pregunta->respuestas as $respuesta)
            <label class="block mb-2 flex items-center">
                <input class="mr-2" type="radio" name="pregunta_{{ $pregunta->id}}">
                {{ $respuesta->respuesta }}
            </label>
            @endforeach

        </div>
        @endforeach
        <div class="text-right">
            <button type="submit" class="bg-indigo-500 focus:shadow-outline focus:outline-none text-white py-3 px-4 rounded mt-4">
                Terminar examen
            </button>
        </div>
    </form>
</x-app-layout>