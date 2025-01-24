<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TrainerOrreLine;


class TrainerOrreLineController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function getAll() {
        $trainerorreline = TrainerOrreLine::join('trainers', 'trainer_orre_lines.trainer', '=', 'trainers.id')->join('lines', 'trainer_orre_lines.line', '=', 'lines.id')->select('trainer', 'line', "name", "species", 'trainer_orre_lines.id')->orderBy('trainer_orre_lines.id', 'asc')->get();
        return response()->json($trainerorreline);
    }

    public function getTrainer($id) {
        $trainerorreline = TrainerOrreLine::join('trainers', 'trainer_orre_lines.trainer', '=', 'trainers.id')->join('lines', 'trainer_orre_lines.line', '=', 'lines.id')->select('trainer', 'line', "name", "species", 'trainer_orre_lines.id')->orderBy('trainers.name', 'asc')->where('trainer_orre_lines.line', '=', $id)->get();
        return response()->json($trainerorreline);
    }
}

