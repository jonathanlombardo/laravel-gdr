@extends('layouts.main')


@section('maincontent')
    <h1 class="text-center mt-5">Crea Nuovo Personaggio</h1>
    <div class="container p-5">
        <form action="{{route("characters.store")}}" method="POST">
        @csrf

        <div class="mb-3">
          <label for="name" class="form-label">Nome</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="zio peppo">
        </div>

        <div class="mb-3">
          <label for="attack" class="form-label">Attacco</label>
          <input type="number" class="form-control" id="attack" name="attack" placeholder="99">
        </div>

        <div class="mb-3">
          <label for="defence" class="form-label">Difesa</label>
          <input type="number" class="form-control" id="defence" name="defence" placeholder="99">
        </div>

        <div class="mb-3">
          <label for="speed" class="form-label">Velocità</label>
          <input type="number" class="form-control" id="speed" name="speed" placeholder="99">
        </div>

        <div class="mb-3">
          <label for="life" class="form-label">Punti Vita</label>
          <input type="number" class="form-control" id="life" name="life" placeholder="99">
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Descrizione</label>
          <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>

        <button class="btn btn-primary">Salva</button>

        </form>
    </div>
@endsection
