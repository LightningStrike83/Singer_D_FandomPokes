<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class twfSuggestion extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["id", "prompt", "description", "submitter"];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
