@extends('layouts.main')

@section('maincontent')
  <section>
    <div class="container py-4">

      <ul>
        <li><b>Nome: </b><span class="fs-6">{{$character->name}}</span></li>
        <li><b>Attacco: </b><span class="fs-6">{{$character->attack}}</span></li>
        <li><b>Difesa: </b><span class="fs-6">{{$character->defence}}</span></li>
        <li><b>Velocità: </b><span class="fs-6">{{$character->speed}}</span></li>
        <li><b>Punti Vita: </b><span class="fs-6">{{$character->life}}</span></li>
      </ul>
      <p class="mt-3">Descrizione:</p>
      <p>{{$character->description}}</p>
      <a href="{{route('characters.edit', $character)}}" class="btn btn-success">Modifica {{$character->name}}</a>
      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleting-modal-{{$character->id}}">
       Elimina {{$character->name}}
      </button>
    </div>
  </section>
@endsection

@section('modals')


  @include('layouts.partials.modal_destroy')
@endsection
