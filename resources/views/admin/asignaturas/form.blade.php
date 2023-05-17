<form class="w-full max-w-lg border-4" method="POST" action="{{ $route }}">
    @csrf
    @isset($update)
    @method("PUT")
    @endisset
    <h1 class="font-semibold">{{ $title }} </h1>
    <div>
        <x-adminlte-input name="nombre" label="Nombre de asignatura" value="{{ $asignatura->nombre }}" />
        <x-adminlte-button label="{{ $textButton}}" type="submit" theme="primary" />
    </div>
</form>