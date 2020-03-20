<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $fillable = [
        'id', 'payment_amount', 'payment_date', 'payment_description', 'member_id'
    ];

    public function payment()
    {
        return $this->belongsTo(member::class);
    }
}
