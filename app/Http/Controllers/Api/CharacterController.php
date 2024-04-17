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

    public function generateChallenge(Request $request){

        $id = $request->id;

        // select of user card
        $character1 = Character::select('id', 'name', 'type_id', 'strength', 'defence', 'speed', 'life', 'intelligence')->with('type:id,image,name')->where('id', $id)->first();
        
        // select of computer card
        $characters = Character::select('id', 'name', 'type_id', 'strength', 'defence', 'speed', 'life', 'intelligence')->with('type:id,image,name')->get()->toArray();
        $character2 = $characters[rand(0, count($characters) - 1)];

        $user = [ $character1->strength, $character1->defence, $character1->speed, $character1->intelligence];
        $computer = [ $character2->strength, $character2->defence, $character2->speed, $character2->intelligence];

        $challenge = [];

        foreach( $character1 as $key => $character_value){
            
            $user_count = 0;
            $computer_count = 0;

            $challenge[$key]['challenge'] = $character1->key . 'vs' . $character2->key;
            if($character1->key > $character2->key ){
                $challenge[$key]['winner'] = $character1->name
            }
        }

        return response()->json([
            'success' => true,
            'user' => $character1,
            'computer' => $character2,
        ]);
    }
}
