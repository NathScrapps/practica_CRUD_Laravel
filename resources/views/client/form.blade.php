@extends('theme.base')

@section('content')
    <div class="container py-5">
        @if (isset($client))
            <h1 class="text-center">Edit Customer</h1>
        @else
            <h1 class="text-center">Create Customer</h1>
        @endif
        
        <div class="col-md-5 m-auto p-3 shadow" style="background-color: #f4f4f4;border-radius: 7px">

            @if (isset($client))
                <form method="post" action="{{ route('client.update',$client) }}">
                    @method('PUT')
            @else
                <form method="post" action="{{ route('client.store') }}">
            @endif
                @csrf
                <div class="mb-3">
                  <label for="nameCustomer" class="form-label">Nombre:</label>
                  <input type="text" class="form-control" name="name" id="nameCustomer" placeholder="Nombre del cliente:" value="{{ old('name') ?? @$client->name }}">
                  @error('name')
                    <p class="form-text text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="due" class="form-label">Saldo:</label>
                  <input type="number" class="form-control" name="due" id="due" placeholder="Saldo del cliente:" step="0.01" value="{{ old('due') ?? @$client->due }}">
                  @error('due')
                    <p class="form-text text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="comments" class="form-label">Comentarios sobre el cliente:</label>
                    <textarea name="comments" id="comments" class="form-control" style="height: 150px;resize: none;">{{ old('comments') ?? @$client->comments }}</textarea>
                    @error('comments')
                        <p class="form-text text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    @if (isset($client))
                        <input type="submit" class="btn btn-primary" value="Actualizar datos del cliente">
                    @else
                        <input type="submit" class="btn btn-primary" value="Agregar cliente">
                    @endif
                </div>
              </form>
        </div>
    </div>
@endsection