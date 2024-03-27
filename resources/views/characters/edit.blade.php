@extends('layouts.main')


@section('maincontent')
    <h1 class="text-center mt-5">Edit Character</h1>
    <div class="container p-5">
        <form action="{{route("characters.update", $character)}}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{$character->name}}">
        </div>

        <div class="mb-3">
          <label for="attack" class="form-label">Attack</label>
          <input type="number" class="form-control" id="attack" name="attack" value="{{$character->attack}}">
        </div>

        <div class="mb-3">
          <label for="defence" class="form-label">Defence</label>
          <input type="number" class="form-control" id="defence" name="defence" value="{{$character->defence}}">
        </div>

        <div class="mb-3">
          <label for="speed" class="form-label">Speed</label>
          <input type="number" class="form-control" id="speed" name="speed" value="{{$character->speed}}">
        </div>

        <div class="mb-3">
          <label for="life" class="form-label">Life</label>
          <input type="number" class="form-control" id="life" name="life" value="{{$character->life}}">
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" id="description" name="description" rows="3">{{$character->description}}</textarea>
        </div>

        <button class="btn btn-primary">Save</button>

        </form>
    </div>
@endsection
