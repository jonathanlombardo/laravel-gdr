@extends('layouts.main')


@section('maincontent')
  <h1 class="text-center mt-5">Crea Nuovo Tipo</h1>
  <div class="container p-5">
    <form action="{{ route('admin.types.store') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="zio peppo" required>
      </div>

      <div class="mb-3">
        <label for="image" class="form-label">Immagine</label>
        <input type="url" class="form-control" id="image" name="image" placeholder="..." required>
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
      </div>

      <button class="btn btn-primary">Salva</button>

    </form>
  </div>
@endsection
