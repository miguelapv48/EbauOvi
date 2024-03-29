@extends("adminlte::page")

@section("content_header")
<div>
    Asignaturas
</div>
@endsection

@section("content")
<div class="flex justify-center flex-wrap bg-blue-400 p-4">
    <div class="text-center">
        <h1 class="mb-5">{{ __("Listado de Asignatura") }}</h1>
        <a href="{{ route('admin.asignaturas.create') }}" class="">
            {{ __("Crear Asignatura") }}
        </a>
    </div>
</div>

<table class="border-separate border-2 text-center border-gray-500 mt-3" style="width: 100%">
    <thead>
        <tr>
            <th class="px-4 py-2">{{ __("Asignatura") }}</th>
        </tr>
    </thead>
    <tbody>
        @forelse($asignaturas as $asignatura)
        <tr>
            <td class="border px-4 py-2">{{ $asignatura->nombre }}</td>
            <td class="border px-4 py-2">
                <a href="{{ route('admin.asignaturas.edit', ['asignatura' => $asignatura]) }}" class="text-blue-400">{{
                    __("Editar") }}</a> |
                <a href="#" class="text-red-400" onclick="event.preventDefault();
                                document.getElementById('delete-asignaturas-{{ $asignatura->id }}-form').submit();">{{
                    __("Eliminar") }}
                </a>
                <form id="delete-asignaturas-{{ $asignatura->id }}-form"
                    action="{{ route('admin.asignaturas.destroy', ['asignatura' => $asignatura]) }}" method="POST"
                    class="hidden">
                    @method("DELETE")
                    @csrf
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4">
                <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative"
                    role="alert">
                    <p><strong class="font-bold">{{ __("No hay asignaturas") }}</strong></p>
                    <span class="block sm:inline">{{ __("Todavía no hay nada que mostrar aquí") }}</span>
                </div>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection