@extends('layouts.app')

@section('main-content')
  <section>
    <div class="container py-4">
      <h1> {{ $character->name }} </h1>
      <a href="{{ route('characters.index') }}" class="btn btn-primary">Go Back to characters' List </a>
      {{-- <a href="{{ route('characters.edit', $character) }}" class="btn btn-success">Edit character</a> --}}
      <span class="h4"><b>Description: </b></span>
      <p>{{$character->description}}</p>
      <hr>
      <span class="h4"><b>Attack: </b><span class="fs-6">{{$character->attack}}</span></span>
      <br>
      <span class="h4"><b>Defence: </b><span class="fs-6">{{$character->defence}}</span></span>
      <br>
      <span class="h4"><b>Seed: </b><span class="fs-6">{{$character->speed}}</span></span>
      <br>
      <span class="h4"><b>Life: </b><span class="fs-6">{{$character->life}}</span></span>
    </div>
  </section>
@endsection
