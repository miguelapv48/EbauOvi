<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bienvenidos') }}
        </h2>
    </x-slot>

    <div class="flex justify-center flex-wrap bg-blue-700 p-4 mt-5">
        <div class="text-center">
            <h1 class="mb-5">{{ __("Listado de noticias") }}</h1>
        </div>
    </div>

    <table class="border-separate border-2 text-center border-blue-500 mt-3" style="width: 100%">
        <thead>
        <tr>
            <th class="px-4 py-2">{{ __("Titulo") }}</th>
            <th class="px-4 py-2">{{ __("Descripcion") }}</th>

        </tr>
        </thead>
        <tbody>
            @forelse($noticias as $noticia)
                <tr>
                    <td class="border px-4 py-2">{{ $noticia->titulo }}</td>
                    <td class="border px-4 py-2">{{ $noticia->descripcion}}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('admin.noticias.edit', ['noticia' => $noticia]) }}" class="text-blue-400">{{ __("Editar") }}</a> |
                        <a
                            href="#"
                            class="text-red-400"
                            onclick="event.preventDefault();
                                document.getElementById('delete-noticias-{{ $noticia->id }}-form').submit();"
                        >{{ __("Eliminar") }}
                        </a>
                        <form id="delete-noticias-{{ $noticia->id }}-form" action="{{ route('admin.noticias.destroy', ['noticia' => $noticia]) }}" method="POST" class="hidden">
                            @method("DELETE")
                            @csrf
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">
                        <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <p><strong class="font-bold">{{ __("No hay noticias") }}</strong></p>
                            <span class="block sm:inline">{{ __("Todavía no hay nada que mostrar aquí") }}</span>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-app-layout>
