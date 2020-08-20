<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wolf extends Model
{
    /**
     * The possible values for gender attribute.
     *
     * TODO: convert to proper Enum
     *
     * @var array
     */
    public const GENDERS = [
        'male', 'female', 'other'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'gender', 'birthdate', 'location', 'pack_id'
    ];
}
