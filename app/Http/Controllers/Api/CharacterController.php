<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $characters = Character::select('id', 'name', 'type_id', 'strength', 'defence', 'speed', 'life', 'intelligence')->with('type:id,image,name')->paginate(10);
        
        return response()->json([
            'success' => true,
            'characters' => $characters
        ]);
    }

    public function generatePCCard(){
        
    }

    public function generateUserCard($id){
        
    }
}
