<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            {{ __('Bienvenidos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue overflow-hidden shadow-xl sm:rounded-lg">
               <p> @foreach($preguntas as $pregunta)</p>
                    <a href="">{{ $pregunta->pregunta }}</a>
                    @foreach($pregunta->respuestas as $respuestas)
                        <p>{{ $respuestas->respuesta }}</p>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
