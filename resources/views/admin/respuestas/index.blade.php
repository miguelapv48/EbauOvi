@extends("adminlte::page")

@section("content")
    <div class="flex justify-center flex-wrap bg-blue-700 p-4 mt-5">
        <div class="text-center">
            <h1 class="mb-5">{{ __("Listar Respuestas") }}</h1>
            <a href="{{ route('admin.respuestas.create') }}" class="bg-blue hover:bg-blue-500 text-blue-700 font-semibold hover:text-blue py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                {{ __("Crear Respuestas") }}
            </a>
        </div>
    </div>

    <table class="border-separate border-2 text-center border-blue-400 mt-3" style="width: 100%">
        <thead>
        <tr>
            <th class="px-4 py-2">{{ __("Respuesta") }}</th>
        </tr>
        </thead>
        <tbody>
            @forelse($respuestas as $respuesta)
                <tr>
                    <td class="border px-4 py-2">{{ $respuesta->respuesta }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('admin.respuestas.edit', ['respuesta' => $respuesta]) }}" class="text-blue-400">{{ __("Editar") }}</a> |
                        <a
                            href="#"
                            class="text-red-400"
                            onclick="event.preventDefault();
                                document.getElementById('delete-respuestas-{{ $respuesta->id }}-form').submit();"
                        >{{ __("Eliminar") }}
                        </a>
                        <form id="delete-respuestas-{{ $respuesta->id }}-form" action="{{ route('admin.respuestas.destroy', ['respuesta' => $respuesta]) }}" method="POST" class="hidden">
                            @method("DELETE")
                            @csrf
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">
                        <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <p><strong class="font-bold">{{ __("No hay respuestas") }}</strong></p>
                            <span class="block sm:inline">{{ __("Todav??a no hay nada que mostrar aqu??") }}</span>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
