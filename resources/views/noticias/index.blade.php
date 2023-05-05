<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            {{ __('Bienvenido a las noticias de EbauOvi') }}
        </h2>
    </x-slot>
    
    <div class="max-w-7xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-6">       
            @foreach ($noticias as $noticia)
                <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2  @endif">
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <h1 class="text-4xl text-blue-400 leading-8 font-bold">
                            <a href="">
                            {{ $noticia->titulo}}
                            </a>
                        </h1>
                    </div> 
                </article>
            @endforeach
        </div>
    </div>
</x-app-layout>
