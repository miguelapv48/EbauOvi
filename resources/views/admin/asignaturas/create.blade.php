@extends("adminlte::page")


@section("content_header")
<div>
    <a href="{{ route('admin.asignaturas.index') }}">Asignaturas</a>
    >
    Crear asignatura
</div>
@endsection

@section("content")
<div class="flex justify-center flex-wrap p-4">
    @include("admin.asignaturas.form")
</div>
@endsection