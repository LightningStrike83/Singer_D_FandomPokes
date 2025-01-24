<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\twfSuggestion;


class twfSuggestionController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function save(Request $request) {
        $this->validate($request, [
            'prompt' => 'required',
            'description' => 'required',
            'submitter' => 'required'
        ]);
        $suggestion = twfSuggestion::create($request->all());
        return response()->json($suggestion, 201);
    }
}

