@extends('theme.base')

@section('content')
    <div class="container py-5 text-center">
        <h1 class="text-center">Client list</h1>
        <a href="{{ route('client.create') }}" class="btn btn-primary">Crear Clientes</a>

        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                <strong>{{ Session::get('mensaje') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <table class="table m-3">
            <thead class="table-dark">
                <th>Nombre</th>
                <th>Deuda</th>
                <th>Comments</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @forelse ($clients as $client)
                    <tr>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->due }}</td>
                        <td class="text-break">{{ $client->comments }}</td>
                        <td>
                            <a href="{{ route('client.edit', $client) }}" class="btn btn-primary m-1" style="width: 100%;">Editar</a>
                            <form action="{{ route('client.destroy',$client) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <input type="submit" class="btn btn-secondary m-1" style="width: 100%;" value="Eliminar" onclick="return confirm('¿Estás seguro de eliminar este cliente?')">
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No se encontraron registros</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>

    @if ($clients->count())
        <div class="container d-flex justify-content-center">
            {{ $clients->links() }}
        </div>
    @endif


@endsection