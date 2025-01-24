<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuessWhoGame extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["id", "shiny", "pokemon1", "pokemon2", "pokemon3", "pokemon4", "pokemon5", "pokemon6", "pokemon7", "pokemon8", "pokemon9", "pokemon10", "pokemon11", "pokemon12", "pokemon13", "pokemon14", "pokemon15", "pokemon16", "pokemon17", "pokemon18", "pokemon19", "pokemon20", "pokemon21", "pokemon22", "pokemon23", "pokemon24", "pokemon25"];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
