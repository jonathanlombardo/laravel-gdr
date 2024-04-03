@extends('layouts.main')


@section('maincontent')
    <h1 class="text-center mt-5">Strumenti</h1>
    <div class="container p-5">
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Slug</th>
                    <th>Descrizione</th>
                    <th>Categoria</th>
                    <th>Tipo</th>
                    <th>Peso</th>
                    <th>Costo</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <tr>
                        <th>{{ $item->name }}</td>
                        <td>{{ $item->slug }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->category }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->weight }}</td>
                        <td>{{ $item->cost }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100%">Non è stato trovato nessun Strumento</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $items->links() }}
    </div>
@endsection
