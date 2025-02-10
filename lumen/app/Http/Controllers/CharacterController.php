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
        $character = Character::select('id', 'name', 'subseries')->where('subseries', "=", $id)->orderBy('name', 'asc')->get();
        return response()->json($character);
    }
}

