<?php

namespace App\Http\Controllers;

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
    return view('characters.index', compact('characters'));
  }

  /**
   * Show the form for creating a new resource.
   *
   */
  public function create()
  {
    return view('characters.create');
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

    return redirect()->route('characters.show', $character);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Characters  $characters
   */
  public function show(Characters $character)
  {
    return view('characters.show', compact('character'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Characters  $characters
   */
  public function edit(Characters $characters)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Characters  $characters
   */
  public function update(Request $request, Characters $characters)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Characters  $characters
   */
  public function destroy(Characters $characters)
  {
    //
  }
}
