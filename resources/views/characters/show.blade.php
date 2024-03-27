@extends('layouts.main')

@section('maincontent')
  <section>
    <div class="container py-4">

      <ul>
        <li><b>Name: </b><span class="fs-6">{{$character->name}}</span></li>
        <li><b>Attack: </b><span class="fs-6">{{$character->attack}}</span></li>
        <li><b>Defence: </b><span class="fs-6">{{$character->defence}}</span></li>
        <li><b>Seed: </b><span class="fs-6">{{$character->speed}}</span></li>
        <li><b>Life: </b><span class="fs-6">{{$character->life}}</span></li>
      </ul>
      <p class="mt-3">Description:</p>
      <p>{{$character->description}}</p>
      
    </div>
  </section>
@endsection
