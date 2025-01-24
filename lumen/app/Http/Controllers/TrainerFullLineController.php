<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TrainerFullLine;


class TrainerFullLineController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function getAll() {
        $trainerfullline = TrainerFullLine::join('trainers', 'trainer_full_lines.trainer', '=', 'trainers.id')->join('lines', 'trainer_full_lines.line', '=', 'lines.id')->select('trainer', 'line', "name", "species", "trainer_full_lines.id")->orderBy('trainer_full_lines.id', 'asc')->get();
        return response()->json($trainerfullline);
    }

    public function getTrainer($id) {
        $trainerfullline = TrainerFullLine::join('trainers', 'trainer_full_lines.trainer', '=', 'trainers.id')->join('lines', 'trainer_full_lines.line', '=', 'lines.id')->select('trainer', 'line', "name", "species", "trainer_full_lines.id")->orderBy('trainers.name', 'asc')->where('trainer_full_lines.line', '=', $id)->get();
        return response()->json($trainerfullline);
    }
}

