@extends("adminlte::page")


@section("content_header")
<div>
    <a href="{{ route('admin.asignaturas.index') }}">Asignaturas</a>
    >
    <a href="{{ route('admin.asignaturas.edit', ['asignatura' => $asignatura]) }}">{{ $asignatura->nombre }}</a>
    >
    Crear examen
</div>
@endsection

@section("content")
<div class="flex justify-center flex-wrap p-4">
    @include("admin.examenes.form")
</div>
@endsection