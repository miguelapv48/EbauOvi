@extends("adminlte::page")


@section("content_header")
<div>
    <a href="{{ route('admin.asignaturas.index') }}">Asignaturas</a>
    >
    {{ $asignatura->nombre }}
</div>
@endsection

@section("content")
<div class="flex justify-center flex-wrap p-4">
    @include("admin.asignaturas.form")
</div>



<div class="flex justify-center flex-wrap bg-blue-700 p-4 mt-5">
    <div class="text-center">
        <h1 class="mb-5">{{ __("Listado de examenes") }}</h1>
        <a href="{{ route('admin.examenes.create', ['asignatura' => $asignatura]) }}"
            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            {{ __("Crear examen") }}
        </a>
    </div>
</div>

<table class="border-separate border-2 text-center border-blue-500 mt-3" style="width: 100%">
    <tbody>
        @forelse($asignatura->examenes as $examen)
        <tr>
            <td class="border px-4 py-2">{{ $examen->nombre }}</td>
            <td class="border px-4 py-2">
                <a href="{{ route('admin.examenes.edit', ['asignatura' => $asignatura, 'examen' => $examen]) }}"
                    class="text-blue-400">{{ __("Editar") }}</a> |
                <a href="#" class="text-red-400" onclick="event.preventDefault();
                            document.getElementById('delete-examenes-{{ $examen->id }}-form').submit();">{{
                    __("Eliminar") }}
                </a>
                <form id="delete-examenes-{{ $examen->id }}-form"
                    action="{{ route('admin.examenes.destroy', ['asignatura' => $asignatura, 'examen' => $examen]) }}"
                    method="POST" class="hidden">
                    @method("DELETE")
                    @csrf
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4">
                <p>{{ __("No existen exámenes para esta asignatura") }}</p>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection