<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class crud extends Model
{
    protected $fillable = [
        'id', 'first_name', 'middle_name', 'last_name'
    ];
}
