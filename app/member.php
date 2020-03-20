<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    protected $fillable = [
        'id', 'customer_name', 'customer_username', 'customer_password', 'customer_address', 'customer_no'
    ];
    public function member()
    {
        return $this->hasOne(booking::class, 'member_id');
    }
    
}
