<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Series;


class SeriesController extends Series {
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function getAll() {
        $series = Series::select('id', 'name')->orderBy('name', 'asc')->get();
        return response()->json($series);
    }
}

