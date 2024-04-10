@extends('layouts.main')

@section('maincontent')
    <section>
        <div class="container py-4">

            <a href="{{ route('admin.characters.index') }}" class="btn btn-primary mb-3">Back to home!</a>

            <ul>
                <li><b>Nome: </b><span class="fs-6">{{ $character->name }}</span></li>
                <li><b>Tipo: </b><span class="fs-6">{{ $character->type->name }}</span></li>
                <li><b>Forza: </b><span class="fs-6">{{ $character->strength }}</span></li>
                <li><b>Difesa: </b><span class="fs-6">{{ $character->defence }}</span></li>
                <li><b>Velocità: </b><span class="fs-6">{{ $character->speed }}</span></li>
                <li><b>Intelligenza: </b><span class="fs-6">{{ $character->intelligence }}</span></li>
                <li><b>Punti Vita: </b><span class="fs-6">{{ $character->life }}</span></li>
            </ul>
            <p class="mt-3">Descrizione:</p>
            <p>{{ $character->description }}</p>
            <a href="{{ route('admin.characters.edit', $character) }}" class="btn btn-success">Modifica
                {{ $character->name }}</a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                data-bs-target="#deleting-modal-{{ $character->id }}">
                Elimina {{ $character->name }}
            </button>
        </div>
    </section>
@endsection

@section('modals')
    @include('layouts.partials.modal_destroy')
@endsection
