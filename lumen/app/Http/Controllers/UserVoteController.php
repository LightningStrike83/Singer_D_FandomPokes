<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\UserVote;


class UserVoteController extends UserVote {

    public function checkOne($user, $vote) {
        $check = UserVote::select('user', 'vote')->where('user', "=", $user)->where('vote', '=', $vote)->orderBy('user')->get();
        return response()->json($check);
    }

    public function postOne(Request $request) {
        $submit = UserVote::create([
            'user' => $request->user,
            'vote' => $request->vote,
        ]);
        return response()->json($submit, 201);
    }

    public function getOne($id) {
        $upvotes = UserVote::join('species_character_controllers', 'user_vote_controllers.vote', "=", 'species_character_controllers.id')->join('character_controllers', 'character_controllers.id', '=', 'species_character_controllers.character_id')->join('species_controllers', 'species_controllers.id', '=', 'species_character_controllers.species_id')->select('character_controllers.id', 'character_controllers.name as character_name', 'number', 'species_controllers.name as species_name', 'type1')->orderBy('character_controllers.name')->get();
        return response()->json($upvotes);
    }
}