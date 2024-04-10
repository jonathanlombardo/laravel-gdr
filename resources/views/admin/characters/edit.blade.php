@extends('layouts.main')


@section('maincontent')
    <h1 class="text-center mt-5">Edit Character</h1>
    <div class="container p-5">
        <form action="{{ route('admin.characters.update', $character) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $character->name }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label">Tipo</label>
                <select name="type_id" id="type_id" class="form-select">
                    <option value="" class="d-none" selected>Seleziona un tipo</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @if ($type->id = $character->type_id) selected @endif>
                            {{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="strength" class="form-label">Forza</label>
                <input type="number" class="form-control" id="strength" name="strength" value="{{ $character->strength }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="defence" class="form-label">Difesa</label>
                <input type="number" class="form-control" id="defence" name="defence" value="{{ $character->defence }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="speed" class="form-label">Velocità</label>
                <input type="number" class="form-control" id="speed" name="speed" value="{{ $character->speed }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="intelligence" class="form-label">Intelligenza</label>
                <input type="number" class="form-control" id="intelligence" name="intelligence"
                    value="{{ $character->intelligence }}" required>
            </div>

            <div class="mb-3">
                <label for="life" class="form-label">Punti Vita</label>
                <input type="number" class="form-control" id="life" name="life" value="{{ $character->life }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $character->description }}</textarea>
            </div>

            <button class="btn btn-primary">Salva</button>

        </form>
    </div>
@endsection
