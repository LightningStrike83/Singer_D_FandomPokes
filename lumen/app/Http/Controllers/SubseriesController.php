<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Subseries;


class SubseriesController extends Subseries {
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function getOne($id) {
        $subseries = Subseries::select('id', 'subseries_name')->where('series', "=", $id)->orderBy('subseries_name', 'asc')->get();
        return response()->json($subseries);
    }
}

