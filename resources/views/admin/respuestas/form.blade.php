<!--<div class="w-full max-w-lg">
    <div class="flex flex-wrap ">
        <h1 class="mb-5 px-300">{{ $title }}</h1>
    </div>
</div>-->

<form class="w-full max-w-lg border-4" method="POST" action="{{ $route }}">
    @csrf
    @isset($update)
        @method("PUT")
    @endisset
     <h1 class="font-semibold py-5 text-blue mb-10 bg-blue-900 text-white px-5">{{ $title }} </h1>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-5">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="titulo">
                {{ __("Pregunta") }}
            </label>
            <select name="id_pregunta">
                @foreach($preguntas as $pregunta)
                    <option value="{{ $pregunta->id }}"
                    @isset($update)
                        @if($respuesta->id_pregunta == $pregunta->id)
                            selected = "selected"
                        @endif
                    @endisset
                    >{{ $pregunta->pregunta }}</option>
                @endforeach
            </select>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-5">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="titulo">
                        {{ __("Respuesta") }}
                    </label>
                    <input name="respuesta" value="{{ old('respuesta') ?? $respuesta->respuesta }}" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="respuesta" type="text">
                    <p class="text-gray-600 text-xs italic -my-3">{{ __("Insertar respuesta") }}</p>
                    @error("respuesta")
                    <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="titulo">
                        {{ __(" La Respuesta es") }}
                    </label>
            <select name="correcta" id="correcta">
                <option value="si">Correcta</option>
                <option value="no">Incorrecta</option>
            </select>
        </div>
    </div>
    <div class="md:flex md:items-center">
        <div class="md:w-1/3">
            <button class="shadow bg-blue-400 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-blue font-bold py-2 px-4 rounded" type="submit">
            {{ $textButton}}
        </button>
        </div>
    </div>
</form>
