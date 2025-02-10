<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SpeciesCharacter;


class SpeciesCharacterController extends SpeciesCharacter {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function getOne($id) {
        $partner = SpeciesCharacter::join('character_controllers', 'character_controllers.id', '=', 'species_character_controllers.character_id')->join('species_controllers', 'species_controllers.id', '=', 'species_character_controllers.species_id')->select('character_id', 'species_id', 'votes', 'number', 'species_controllers.name', 'type1')->where('character_id', "=", $id)->orderBy('votes', 'desc')->get();
        return response()->json($partner);
    }
}

