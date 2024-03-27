@extends('layouts.main')


@section('maincontent')
    <h1 class="text-center mt-5">Character</h1>
    <div class="container p-5">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Attack</th>
                    <th>Defence</th>
                    <th>Speed</th>
                    <th>Life</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($characters as $character)
                    <tr>
                        <th>{{ $character->name }}</td>
                        <td>{{ $character->description }}</td>
                        <td>{{ $character->attack }}</td>
                        <td>{{ $character->defence }}</td>
                        <td>{{ $character->speed }}</td>
                        <td>{{ $character->life }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100%">Character Not Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $characters->links() }}
    </div>
@endsection
