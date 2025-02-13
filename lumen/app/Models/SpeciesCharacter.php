<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpeciesCharacter extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["character_id", "species_id", "votes"];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
