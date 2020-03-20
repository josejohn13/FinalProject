<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    protected $fillable = [
        'id', 'book_date', 'book_type', 'book_description', "destination_id"
    ];

    public function destination()
    {
        return $this->belongsTo(destination::class);
    }
    public function member()
    {
        return $this->belongsTo(member::class);
    }
    public function payment()
    {
        return $this->hasOne(payment::class,"member_id");
    }
}
