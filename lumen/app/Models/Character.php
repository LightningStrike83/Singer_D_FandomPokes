<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["id", "number", "subseries"];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
