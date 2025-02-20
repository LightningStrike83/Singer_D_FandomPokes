<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["username", "password", "email", "icon", "fav_pokemon", "fav_trainer", "fav_characters", "fav_series", "fandoms"];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
