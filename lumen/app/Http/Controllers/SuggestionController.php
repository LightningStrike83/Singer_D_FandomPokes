<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Suggestion;


class SuggestionController extends Suggestion {
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function addSuggestion(Request $request) {
        $suggestion = Suggestion::create([
            'character_name' => $request->character_name,
            'series' => $request->series,
            'subseries' => $request->subseries,
            'wiki_page' => $request->wiki_page,
            'starting_pokemon' => $request->starting_pokemon,
            'submitter' => $request->submitter
        ]);
        return response()->json($suggestion, 201);
    }
}

