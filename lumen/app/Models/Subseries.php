<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subseries extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["id", "subseries_name", "series"];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
