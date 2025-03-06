<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\SpeciesCharacter;


class SpeciesCharacterController extends SpeciesCharacter {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function getOne($id) {
        $partner = SpeciesCharacter::join('character_controllers', 'character_controllers.id', '=', 'species_character_controllers.character_id')->join('species_controllers', 'species_controllers.id', '=', 'species_character_controllers.species_id')->select('character_id', 'species_id', 'shiny', 'votes', 'number', 'species_controllers.name', 'type1', 'species_character_controllers.id')->where('character_id', "=", $id)->orderBy('votes', 'desc')->get();
        return response()->json($partner);
    }

    public function checkPartners($character, $species, $shiny) {
        $check = SpeciesCharacter::select('character_id', 'species_id', 'shiny')->where('character_id', "=", $character)->where('species_id', '=', $species)->where('shiny', '=', $shiny)->orderBy('character_id')->get();
        return response()->json($check);
    }

    public function addPartner(Request $request) {    
        $submit = SpeciesCharacter::create([
            'character_id' => $request->character_id,
            'species_id' => $request->species_id,
            'shiny' => $request->shiny,
            'votes' => $request->votes,
        ]);
        return response()->json($submit, 201);
    }

    public function updateOne(Request $request, $id) {
        $submit = SpeciesCharacter::where('id', '=', $id)->update([
            'votes' => $request->votes
        ]);

        return response()->json($submit, 200);
    }

}

