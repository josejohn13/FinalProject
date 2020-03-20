<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class destination extends Model
{
    protected $fillable = [
        'id', 'destination_name', 'destination_description'
    ];

    public function destination()
    {
        return $this->hasOne(booking::class, 'destination_id');
    }
}
