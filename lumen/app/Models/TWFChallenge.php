<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class twfChallenge extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["id", "prompt", "description", "credit"];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
