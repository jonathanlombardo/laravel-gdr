@extends('layouts.main')


@section('maincontent')
    <h1 class="text-center mt-5">Character</h1>
    <div class="text-center">
      <a href="{{route('characters.create')}}" class="btn btn-primary">Nuovo Character</a>
    </div>
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

@section('modals')
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleting-modal-1">
    Launch demo modal
  </button>
  <!-- Button trigger modal -->


  @foreach ($characters as $character)
  <div class="modal fade" id="deleting-modal-{{$character->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina {{$character->name}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          L'operazione non è reversibile. Continuare?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
          <form action="{{route('characters.destroy', $character)}}" method="POST">
            @csrf
            @method("DELETE")
            <button class="btn btn-danger">Elimina personaggio</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach
@endsection
