<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Line;


class LineController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function getAll() {
        $line = Line::select('id', 'species')->orderBy('species', 'asc')->get();
        return response()->json($line);
    }

    public function getOne($id){
        $line = Line::find($id);
        return response()->json($line);
    }
}

