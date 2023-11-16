@extends("adminlte::page")



@section("content_header")
<div>
    <a href="{{ route('admin.asignaturas.index') }}">Asignaturas</a>
    >
    <a href="{{ route('admin.asignaturas.edit', ['asignatura' => $asignatura]) }}">{{ $asignatura->nombre }}</a>
    >
    {{ $examen->nombre }}
</div>
@endsection

@section("content")
<div class="flex justify-center flex-wrap p-4 mt-5">
    @include("admin.examenes.form")
</div>


<div class="flex justify-center flex-wrap bg-blue-700 p-4 mt-5">
    <div class="text-center">
        <h1 class="mb-5">{{ __("Preguntas") }}</h1>
    </div>

    @forelse($examen->preguntas as $pregunta)
    <div class="bg-white p-3 mb-4 position-relative">
        <form
            action="{{ route('admin.preguntas.destroy', ['asignatura' => $asignatura, 'examen' => $examen, 'pregunta' => $pregunta]) }}"
            method="POST" class="position-absolute" style="top:0; right:0;">
            @csrf
            @method('DELETE')
            <x-adminlte-button type="submit" theme="danger" class="btn-sm" icon="fas fa-trash" />
        </form>

        <form
            action="{{ route('admin.preguntas.update', ['asignatura' => $asignatura, 'examen' => $examen, 'pregunta' => $pregunta]) }}"
            method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <x-adminlte-input name="titulo" label="Título" placeholder="Título de la pregunta"
                    fgroup-class="col-md-6" value="{{ $pregunta->titulo }}" />
            </div>

            <p>Respuestas</p>
            @foreach ($pregunta->respuestas as $respuesta)

            <div class="row d-flex aling-items-center">
                <x-adminlte-input name="respuestas[{{$respuesta->id}}]" placeholder="Texto de la respuesta"
                    fgroup-class="col-md-6" value="{{ $respuesta->respuesta }}" />

                <div class="ml-4 form-group form-check form-check-inline">
                    <label class="form-check-label" for="correcta[{{$respuesta->id}}]">Correcta:</label>
                    <input class="form-check-input ml-2" type="radio" name="correcta" id="correcta[{{$respuesta->id}}]"
                        @checked($respuesta->correcta) value="{{$respuesta->id}}" />
                </div>
            </div>
            @endforeach
            <div class="row">
                <div class="col w-1/2">
                    <div class="image-wrapper">
                    <img src="https://cdn.pixabay.com/photo/2015/07/31/11/45/library-869061_1280.jpg" alt="">
                </div>
                <div class="col"></div>

            <div class="text-right">
                <x-adminlte-button label="Guardar" type="submit" theme="primary" />
            </div>
        </form>
    </div>
    @empty
    <p class="text-center">{{ __('El examen no tiene preguntas') }}</p>
    @endforelse


    <div class="text-center">
        <a href="#"
            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
            onclick="event.preventDefault();
        document.getElementById('create-pregunta-form').submit();">
            {{
            __("Crear pregunta") }}
        </a>
        <form id="create-pregunta-form"
            action="{{ route('admin.preguntas.store', ['asignatura' => $asignatura, 'examen' => $examen]) }}"
            method="POST" class="hidden">
            @csrf
        </form>
    </div>
</div>
@section('css')
<style>
    .image-wrapper{
        position: relative;
        padding-bottom: 56.25%;
    }
    .image-wrapper img{
        position: relative;
        object-fit: cover;
        width: 50%;
        height: 50%;
        float: right;
    }
</style>
@stop
@endsection