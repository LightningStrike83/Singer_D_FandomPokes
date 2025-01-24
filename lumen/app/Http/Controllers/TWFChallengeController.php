<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\twfChallenge;


class twfChallengeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function getAll() {
        $challenge = twfChallenge::select('id', 'prompt', 'description', 'credit')->orderBy('id', 'asc')->get();
        return response()->json($challenge);
    }
}

