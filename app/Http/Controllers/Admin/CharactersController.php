<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\Characters;
use Illuminate\Http\Request;

class CharactersController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * 
   */
  public function index()
  {
    $characters = Characters::paginate();
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

    $character = new Characters;
    $character->fill($datas);
    $character->save();

    return redirect()->route('admin.characters.show', $character);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Characters  $characters
   */
  public function show(Characters $character)
  {
    return view('admin.characters.show', compact('character'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Characters  $characters
   */
  public function edit(Characters $character)
  {
    $types = Type::all();
    return view('admin.characters.edit', compact('character', 'types'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Characters  $characters
   */
  public function update(Request $request, Characters $character)
  {
    $datas = $request->all();

    $character->update($datas);

    return redirect()->route('admin.characters.show', $character);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Characters  $characters
   */
  public function destroy(Characters $character)
  {
    $character->delete();
    return redirect()->route('admin.characters.index');
  }
}
