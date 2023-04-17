<!--<div class="w-full max-w-lg">
    <div class="flex flex-wrap ">
        <h1 class="mb-5 px-300">{{ $title }}</h1>
    </div>
</div>-->
<style>
    .respuestas{
        color: blue;
        margin: 20px;
    }
    input[type=text]{
        width: 70%;
    }
    input[type=checkbox]{
        width: 10%;
    }
</style>
<form class="w-full max-w-lg border-4" method="POST" action="{{ $route }}">
    @csrf
    @isset($update)
        @method("PUT")
    @endisset
     <h1 class="font-semibold py-5 text-blue mb-10 bg-blue-900 text-white px-5">{{ $title }} </h1>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-5">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="test">
                {{ __("Test") }}
            </label>
            <select name="id_test">
                @foreach($tessts as $tesst)
                    <option value="{{ $tesst->id }}"
                    @isset($update)
                        @if($pregunta->id_test == $tesst->id)
                            selected = "selected"
                        @endif
                    @endisset
                    >{{ $tesst->nombre }}</option>
                @endforeach
            </select>
            <p class="text-gray-600 text-xs italic -my-3">{{ __("Inserte test") }}</p>
            @error("nombre")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
            <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-5">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="titulo">
                {{ __("Que tipo de pregunta") }}
            </label>
            <input name="pregunta" value="{{ old('pregunta') ?? $pregunta->pregunta }}" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="pregunta" type="text">
            <p class="text-gray-900 text-xs italic -my-3">{{ __("Insertar pregunta") }}</p>
            @error("nombre")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
            <br>
            {{$i=1}}
            @forelse($respuestas as $respuesta)
                <p>{{$i}}) <input type="text" name="respuesta{{$i}}" value="{{ $respuesta->respuesta }}">
                    <input type="checkbox" name="correcta{{$i}}" value="correcta"
                    @if($respuesta->correcta =="correcta")
                        checked
                    @endif
                    </p>
                {{$i++}}
            @empty
            <div class="respuestas">
                <p>a) <input type="text" name="respuesta1"><input type="checkbox" name="correcta1" value="correcta"></p>
                <p>b) <input type="text" name="respuesta2"><input type="checkbox" name="correcta2" value="correcta"></p>
                <p>c) <input type="text" name="respuesta3"><input type="checkbox" name="correcta3" value="correcta"></p>
                <p>d) <input type="text" name="respuesta4"><input type="checkbox" name="correcta4" value="correcta"></p>
            </div>
            @endforelse
            <input type="submit"></input><br>
            
        </div>
    </div>
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

