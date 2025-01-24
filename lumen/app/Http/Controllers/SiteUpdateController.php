<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SiteUpdate;


class SiteUpdateController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function getThree() {
        $update = SiteUpdate::select('id', 'title', 'text', 'date')->limit('3')->orderBy('id', 'desc')->get();
        return response()->json($update);
    }
}

