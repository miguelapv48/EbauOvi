<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            {{ __('Noticias de EbauOvi') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-8 px-4">
        <div class="grid grid-cols-[repeat(auto-fill,_250px)] gap-6">
            @foreach ($noticias as $noticia)
            <article class="bg-white shadow-xl sm:rounded-lg p-4">
                <h3 class="font-bold">
                    <a href="{{ route('noticia',['id' => $noticia->id]) }}">
                        {{ $noticia->titulo}}
                    </a>
                </h3>
                <p class="mt-2 text-gray-800">
                    {{ $noticia->descripcion}}
                </p>
            </article>
            @endforeach
        </div>
    </div>
</x-app-layout>