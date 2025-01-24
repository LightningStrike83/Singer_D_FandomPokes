<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\twfPrompt;


class twfPromptController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function getAll() {
        $prompt = twfPrompt::select('id', 'prompt', 'description', 'credit', 'random')->orderBy('id', 'asc')->get();
        return response()->json($prompt);
    }
}

