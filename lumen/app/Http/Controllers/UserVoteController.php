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

}