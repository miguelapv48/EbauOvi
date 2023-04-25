@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>EbauOvi</h1>
@stop

@section('content')
<table class="table table-danger table-striped" style="width: 100%">
        <thead>
        <tr>
            <th scope="col">{{ ("Nombre") }}</th>
            <th scope="col">{{ ("Email") }}</th>
            <th scope="col">{{ ("Creado") }}</th>
            <th scope="col">{{ ("Acciones") }}</th>
        </tr>
        </thead>
        <tbody>
            @forelse($usuarios as $user)
                <tr>

                    <td>{{ $user->name }}</td>

                    <td>{{ $user->email }}</td>


                    <td class="border px-4 py-2">
                        <a
                            href="#"
                            class="btn btn-danger text-red-400"
                            onclick="event.preventDefault();
                                document.getElementById('delete-usuario-{{ $user->id }}-form').submit();"
                        >{{ __("Eliminar") }}
                        </a>
                        <form id="delete-usuario-{{ $user->id }}-form" action="{{ route('admin.users.destroy', ['user' => $user]) }}" method="POST" class="hidden">
                            @method("DELETE")
                            @csrf
                        </form>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="4">
                        <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <p><strong class="font-bold">{{ __("No hay usuarios") }}</strong></p>
                            <span class="block sm:inline">{{ __("Todavía no hay nada que mostrar aquí") }}</span>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-3">

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop