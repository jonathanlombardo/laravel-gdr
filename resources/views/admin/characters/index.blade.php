@extends('layouts.main')

@section('assets')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('maincontent')
    <h1 class="text-center mt-5">Personaggio</h1>
    <div class="text-center">
        <a href="{{ route('admin.characters.create') }}" class="btn btn-primary">Nuovo Personaggio</a>
    </div>
    <div class="container p-5">
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Descrizione</th>
                    <th>Forza</th>
                    <th>Difesa</th>
                    <th>Velocità</th>
                    <th>Intelligenza</th>
                    <th>Punti Vita</th>
                    <th>Dettagli Personaggio</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($characters as $character)
                    <tr class="text-center">
                        <th>{{ $character->name }}</th>
                        <td>{{ $character->type->name }}</td>
                        <td>{{ $character->get_description() }}</td>
                        <td>{{ $character->strength }}</td>
                        <td>{{ $character->defence }}</td>
                        <td>{{ $character->speed }}</td>
                        <td>{{ $character->intelligence }}</td>
                        <td>{{ $character->life }}</td>
                        <td>

                            <a href="{{ route('admin.characters.show', $character) }}" class="btn btn-primary"><i
                                    class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('admin.characters.edit', $character) }}" class="btn btn-warning"><i
                                    class="fa-solid fa-user-pen"></i></a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleting-modal-{{ $character->id }}"><i
                                    class="fa-solid fa-trash"></i></button>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="100%">Nessun Personaggio Trovato</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $characters->links() }}
    </div>
@endsection

@section('modals')
    @foreach ($characters as $character)
        @include('layouts.partials.modal_destroy')
    @endforeach
@endsection
