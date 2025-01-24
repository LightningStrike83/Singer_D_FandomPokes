<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteUpdate extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["id", "title", "text", "date"];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
