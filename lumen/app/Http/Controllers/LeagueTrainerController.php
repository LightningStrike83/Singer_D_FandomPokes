<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LeagueTrainer;


class LeagueTrainerController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function getAll() {
        $trainer = LeagueTrainer::select('id', 'name')->orderBy('name', 'asc')->get();
        return response()->json($trainer);
    }

    public function getGymLeaders() {
        $trainer = LeagueTrainer::select('id', 'name')->where('gym_leader', '=', 'y')->orderBy('name', 'asc')->get();
        return response()->json($trainer);
    }

    public function getE4() {
        $trainer = LeagueTrainer::select('id', 'name')->where('e4', '=', 'y')->orderBy('name', 'asc')->get();
        return response()->json($trainer);
    }
    
    public function getChampions() {
        $trainer = LeagueTrainer::select('id', 'name')->where('champion', '=', 'y')->orderBy('name', 'asc')->get();
        return response()->json($trainer);
    }

    public function getSuperboss() {
        $trainer = LeagueTrainer::select('id', 'name')->where('superboss', '=', 'y')->orderBy('name', 'asc')->get();
        return response()->json($trainer);
    }
}

