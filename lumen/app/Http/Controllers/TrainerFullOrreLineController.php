<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TrainerFullOrreLine;


class TrainerFullOrreLineController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function getAll() {
        $trainerfullorreline = TrainerFullOrreLine::join('trainers', 'trainer_full_orre_lines.trainer', '=', 'trainers.id')->join('lines', 'trainer_full_orre_lines.line', '=', 'lines.id')->select('trainer', 'line', "name", "species", "trainer_full_orre_lines.id")->orderBy('trainer_full_orre_lines.id', 'asc')->get();
        return response()->json($trainerfullorreline);
    }

    public function getTrainer($id) {
        $trainerfullorreline = TrainerFullOrreLine::join('trainers', 'trainer_full_orre_lines.trainer', '=', 'trainers.id')->join('lines', 'trainer_full_orre_lines.line', '=', 'lines.id')->select('trainer', 'line', "name", "species", "trainer_full_orre_lines.id")->orderBy('trainers.name', 'asc')->where('trainer_full_orre_lines.line', '=', $id)->get();
        return response()->json($trainerfullorreline);
    }
}

