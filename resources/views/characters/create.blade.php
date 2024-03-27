@extends('layouts.main')


@section('maincontent')
    <h1 class="text-center mt-5">Create Character</h1>
    <div class="container p-5">
        <form action="{{route("characters.store")}}" method="POST">
        @csrf

        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="zio peppo">
        </div>

        <div class="mb-3">
          <label for="attack" class="form-label">Attack</label>
          <input type="number" class="form-control" id="attack" name="attack" placeholder="99">
        </div>

        <div class="mb-3">
          <label for="defence" class="form-label">Defence</label>
          <input type="number" class="form-control" id="defence" name="defence" placeholder="99">
        </div>

        <div class="mb-3">
          <label for="speed" class="form-label">Speed</label>
          <input type="number" class="form-control" id="speed" name="speed" placeholder="99">
        </div>

        <div class="mb-3">
          <label for="life" class="form-label">Life</label>
          <input type="number" class="form-control" id="life" name="life" placeholder="99">
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>

        <button class="btn btn-primary">Save</button>

        </form>
    </div>
@endsection
