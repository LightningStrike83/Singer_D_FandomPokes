<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Species;


class SpeciesController extends Species {
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function getAll() {
        $species = Species::select('number', 'name', 'type1', 'id')->orderBy('name', 'asc')->get();
        return response()->json($species);
    }

    public function getTypes($type) {
        $species = SpeciesController::from('species_controllers as sc1')  
                          ->join('types as t1', 'sc1.type1', '=', 't1.id')  // INNER JOIN for type1
                          ->leftJoin('types as t2', 'sc1.type2', '=', 't2.id')  // LEFT JOIN for type2
                          ->select('sc1.number', 'sc1.name')  
                          ->where('t1.type', '=', $type)  
                          ->orWhere(function ($query) use ($type) {
                              $query->where('t2.type', '=', $type)
                                    ->whereNotNull('t2.id');  // Only include relevant type2 entries
                          })
                          ->orderBy('sc1.number', 'asc')
                          ->get();
    
        return response()->json($species);
    }
    
    
    
}

