<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * 
   */
  public function index()
  {
    $characters = Character::paginate();
    return view('admin.characters.index', compact('characters'));
  }

  /**
   * Show the form for creating a new resource.
   *
   */
  public function create()
  {
    $types = Type::all();
    return view('admin.characters.create', compact('types'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   */
  public function store(Request $request)
  {
    $datas = $request->all();

    $character = new Character;
    $character->fill($datas);
    $character->save();

    return redirect()->route('admin.characters.show', $character);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Character  $characters
   */
  public function show(Character $character)
  {
    return view('admin.characters.show', compact('character'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Character  $characters
   */
  public function edit(Character $character)
  {
    $types = Type::all();
    return view('admin.characters.edit', compact('character', 'types'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Character  $characters
   */
  public function update(Request $request, Character $character)
  {
    $datas = $request->all();

    $character->update($datas);

    return redirect()->route('admin.characters.show', $character);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Character  $characters
   */
  public function destroy(Character $character)
  {
    $character->delete();
    return redirect()->route('admin.characters.index');
  }
}
