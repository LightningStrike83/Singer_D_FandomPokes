<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TrainerLine;


class TrainerLineController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function getAll() {
        $trainerline = TrainerLine::join('trainers', 'trainer_lines.trainer', '=', 'trainers.id')->join('lines', 'trainer_lines.line', '=', 'lines.id')->select('trainer', 'line', "name", "species", "trainer_lines.id")->orderBy('trainer_lines.id', 'asc')->get();
        return response()->json($trainerline);
    }

    public function getTrainer($id) {
        $trainerline = TrainerLine::join('trainers', 'trainer_lines.trainer', '=', 'trainers.id')->join('lines', 'trainer_lines.line', '=', 'lines.id')->select('trainer', 'line', "name", "species", "trainer_lines.id")->orderBy('trainers.name', 'asc')->where('trainer_lines.line', '=', $id)->get();
        return response()->json($trainerline);
    }
}

