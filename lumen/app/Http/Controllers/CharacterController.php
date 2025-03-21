<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Character;


class CharacterController extends Character {
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function getOne($id) {
        $character = Character::select('id', 'name', 'subseries', 'link')->where('subseries', "=", $id)->orderBy('name', 'asc')->get();
        return response()->json($character);
    }

    public function getSubmitter($id) {
        $submitter = Character::join('subseries_controllers', 'character_controllers.subseries', "=", "subseries_controllers.id")->select('character_controllers.id', 'name', 'subseries_name', 'submitter')->where('submitter', "=", $id)->orderBy('subseries_name', "asc")->get();
        return response()->json($submitter);
    }
}

