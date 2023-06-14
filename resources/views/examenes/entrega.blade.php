<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            {{ $entrega->examen->nombre }}
        </h2>
    </x-slot>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl sm:rounded-lg p-4 mb-4 inline-block">
            Nota final: <span
                class="text-2xl"><span
                    class="text-2xl font-bold @if($entrega->resultado() >=5) text-green-500 @else text-red-500 @endif">{{
                    $entrega->resultado() }}</span> / 10</span>
        </div>
        @foreach($entrega->examen->preguntas as $pregunta)
        <div class="bg-white shadow-xl sm:rounded-lg p-4 mb-4">
            <h3 class="text-lg">{{ $pregunta->titulo }}</h3>
            @foreach($pregunta->respuestas as $respuesta)
            <label
                class="block mb-2 flex items-center  @if ($respuesta->correcta) text-green-500 @else @if ($entrega->respuestas->contains($respuesta->id)) text-red-500 @endif @endif">
                <input disabled="disabled" class="mr-2 border-gray-300" type="radio"
                    name="preguntas[{{ $pregunta->id}}]" value="{{ $respuesta->id}}"
                    @checked($entrega->respuestas->contains($respuesta->id))>
                {{ $respuesta->respuesta }}
            </label>
            @endforeach

        </div>
        @endforeach
        </form>
</x-app-layout>