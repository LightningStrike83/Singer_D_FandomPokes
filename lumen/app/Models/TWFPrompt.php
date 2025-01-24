<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class twfPrompt extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["id", "prompt", "description", "credit", "random"];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
