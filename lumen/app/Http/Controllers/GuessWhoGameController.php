<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GuessWhoGame;


class GuessWhoGameController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function getOne($id) {
        $guesswho = GuessWhoGame::where('id', $id)->first();
        
        if (!$guesswho) {
            // Handle case where no GuessWhoGame record with the given id is found
            return response()->json(['error' => 'GuessWhoGame not found'], 404);
        }
        
        $pokemonData = [];
        
        // Loop through each number in the GuessWhoGame record and retrieve corresponding Pokemon data
        for ($i = 1; $i <= 25; $i++) {
            $pokemonNumber = $guesswho->{"pokemon$i"};
            $pokemon = SpeciesController::where('number', $pokemonNumber)->first(); // using your original variable name
            
            if ($pokemon) {
                $pokemonData["pokemon$i"] = [  // keeping your structure intact
                    'number' => $pokemon->number,
                    'name' => $pokemon->name
                ];
            }
        }
    
        // Include shiny data at the root level, and keep pokemonData as separate entries
        return response()->json(array_merge(
            ['shiny' => $guesswho->shiny],
            $pokemonData
        ));
    }
    
    

    public function save(Request $request) {
        $this->validate($request, [
            'shiny' => 'required',
            'pokemon1' => 'required',
            'pokemon2' => 'required',
            'pokemon3' => 'required',
            'pokemon4' => 'required',
            'pokemon5' => 'required',
            'pokemon6' => 'required',
            'pokemon7' => 'required',
            'pokemon8' => 'required',
            'pokemon9' => 'required',
            'pokemon10' => 'required',
            'pokemon11' => 'required',
            'pokemon12' => 'required',
            'pokemon13' => 'required',
            'pokemon14' => 'required',
            'pokemon15' => 'required',
            'pokemon16' => 'required',
            'pokemon17' => 'required',
            'pokemon18' => 'required',
            'pokemon19' => 'required',
            'pokemon20' => 'required',
            'pokemon21' => 'required',
            'pokemon22' => 'required',
            'pokemon23' => 'required',
            'pokemon24' => 'required',
            'pokemon25' => 'required',
        ]);
        $guesswho = GuessWhoGame::create($request->all());
        return response()->json($guesswho, 201);
    }
}

