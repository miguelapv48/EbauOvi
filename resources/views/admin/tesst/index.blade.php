@extends("adminlte::page")

@section("content")
    <div class="flex justify-center flex-wrap bg-blue-700 p-4 mt-5">
        <div class="text-center">
            <h1 class="mb-5">{{ __("Listado de Tests") }}</h1>
            <a href="{{ route('admin.tesst.create') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                {{ __("Crear Tests") }}
            </a>
        </div>
    </div>

    <table class="border-separate border-2 text-center border-blue-500 mt-3" style="width: 100%">
        <thead>
        <tr>
            <th class="px-4 py-2">{{ __("Test") }}</th>
        </tr>
        </thead>
        <tbody>
            @forelse($tesst as $test)
                <tr>
                    <td class="border px-4 py-2">{{ $test->nombre }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('admin.tesst.edit', ['tesst' => $test]) }}" class="text-blue-400">{{ __("Editar") }}</a> |
                        <a
                            href="#"
                            class="text-red-400"
                            onclick="event.preventDefault();
                                document.getElementById('delete-tessts-{{ $test->id }}-form').submit();"
                        >{{ __("Eliminar") }}
                        </a>
                        <form id="delete-tessts-{{ $test->id }}-form" action="{{ route('admin.tesst.destroy', ['tesst' => $test]) }}" method="POST" class="hidden">
                            @method("DELETE")
                            @csrf
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">
                        <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <p><strong class="font-bold">{{ __("No hay mas test") }}</strong></p>
                            <span class="block sm:inline">{{ __("Todavía no hay nada que mostrar aquí") }}</span>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
