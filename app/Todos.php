<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todos extends Model
{
    //
    public $timestamps = true;

    protected $fillable = [
        'title', 'completed', 'user_id'
    ];
}
