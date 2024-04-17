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
        $characters = Character::select('id', 'name', 'type_id', 'strength', 'defence', 'speed', 'life', 'intelligence')->with('type:id,image,name')->where('id', '<>', $id)->get()->toArray();
        $character2 = $characters[rand(0, count($characters) - 1)];

        // user stats
        $user =
            [ 
                'strength' => $character1['strength'], 
                'defence' => $character1['defence'], 
                'speed' => $character1['speed'], 
                'intelligence' => $character1['intelligence']
            ];

        // computer stats
        $computer =
            [ 
                'strength' => $character2['strength'], 
                'defence' => $character2['defence'], 
                'speed' => $character2['speed'], 
                'intelligence' => $character2['intelligence']
            ];

        // fight array with all the results 
        $fight = [];

        // count of challenges won
        $user_count = 0;
        $computer_count = 0;

        // final winner
        $winner = '';

        // fight cycle
        foreach( $computer as $key => $character_stats){
 
            // single challenge array
            $challenge = [
                'type' => $key,
                'values' => $character_stats . 'vs' . $user[$key],
                'winner' => '',
            ];

            if($character_stats > $user[$key]){
                $challenge['winner'] = $character2['name'];
                $computer_count = $computer_count + 1;
            } else if($character_stats < $user[$key]){
                $challenge['winner'] = $character1['name'];
                $user_count = $user_count + 1;
            } else {
                $challenge['winner'] = 'Pareggio';
            }

            array_push($fight, $challenge);
        }

        // find the winner
        if($user_count>$computer_count){
            $winner = $character1['name'];
        } else if ($user_count < $computer_count){
            $winner = $character2['name'];
        } else {
            $winner = 'Pareggio';
        }

        // api response
        return response()->json([
            'success' => true,
            'user' => $character1,
            'computer' => $character2,
            'figth' => $fight,
            'winner' => $winner
        ]);
    }
}
