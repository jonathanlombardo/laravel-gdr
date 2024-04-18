@extends('layouts.main')

@section('maincontent')
  <section>
    <div class="container py-4">

      <a href="{{ route('admin.types.index') }}" class="btn btn-primary mb-3">Back to home!</a>

      <div class="d-flex gap-3">
        <img src="{{ $type->imgUrl }}" alt="{{ $type->name }} image">
        <div>
          <h1>{{ $type->name }}</h1>
          <p class="mt-3">Descrizione:</p>
          <p>{{ $type->description }}</p>
          <a href="{{ route('admin.types.edit', $type) }}" class="btn btn-success">Modifica
            {{ $type->name }}</a>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleting-modal-{{ $type->id }}">
            Elimina {{ $type->name }}
          </button>
        </div>

      </div>

    </div>
  </section>
@endsection

@section('modals')
  @include('layouts.partials.type_modal_destroy')
@endsection
