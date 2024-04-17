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

        $data = $request->all();

        $id = $data['id'];

        // select of user card
        $character1 = Character::select('id', 'name', 'type_id', 'strength', 'defence', 'speed', 'life', 'intelligence')->with('type:id,image,name')->where('id', $id)->first()->toArray();
        
        // select of computer card
        $characters = Character::select('id', 'name', 'type_id', 'strength', 'defence', 'speed', 'life', 'intelligence')->with('type:id,image,name')->get()->toArray();
        $character2 = $characters[rand(0, count($characters) - 1)];

        $user =
            [ $character1['strength'], $character1['defence'], $character1['speed'], $character1['intelligence']];

        
        $computer = [ $character2['strength'], $character2['defence'], $character2['speed'], $character2['intelligence']];

        $fight = [];
        $user_count = 0;
        $computer_count = 0;

        foreach( $computer as $key => $character_stats){
 
            $challenge = [
                'type' => $key,
                'values' => $computer[$key] . 'vs' . $user[$key],
                'winner' => '',
            ];

            if($computer[$key] > $user[$key]){
                $challenge['winner'] = $character2['name'];
                $computer_count = $computer_count + 1;
            } else if($computer[$key] < $user[$key]){
                $challenge['winner'] = $character1['name'];
                $user_count = $user_count + 1;
            } else {
                $challenge['winner'] = 'Pareggio';
            }

            array_push($fight, $challenge);
        }

    

        $winner = '';

        if($user_count>$computer_count){
            $winner = $character1['name'];
        } else if ($user_count < $computer_count){
            $winner = $character2['name'];
        } else {
            $winner = 'Pareggio';
        }


        return response()->json([
            'success' => true,
            'user' => $character1,
            'computer' => $character2,
            'figth' => $fight,
            'winner' => $winner
        ]);
    }
}
