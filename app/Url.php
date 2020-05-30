<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'shorten_url', 'real_url', 'click_counter', 'shorten_counter', 'type'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
