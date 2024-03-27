@extends('layouts.main')

@section('assets')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('maincontent')
    <h1 class="text-center mt-5">Personaggio</h1>
    <div class="text-center">
        <a href="{{ route('characters.create') }}" class="btn btn-primary">Nuovo Personaggio</a>
    </div>
    <div class="container p-5">
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th>Nome</th>
                    <th>Descrizione</th>
                    <th>Attacco</th>
                    <th>Difesa</th>
                    <th>Velocità</th>
                    <th>Punti Vita</th>
                    <th>Dettagli Personaggio</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($characters as $character)
                    <tr class="text-center">
                        <th>{{ $character->name }}</td>
                        <td>{{ $character->description }}</td>
                        <td>{{ $character->attack }}</td>
                        <td>{{ $character->defence }}</td>
                        <td>{{ $character->speed }}</td>
                        <td>{{ $character->life }}</td>
                        <td><a href="{{ route('characters.show', $character) }}"
                                class="btn btn-primary"><i class="fa-solid fa-eye"></i></a></td>
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
