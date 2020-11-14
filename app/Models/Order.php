<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    protected $guarded = ['id'];
    protected $casts = [
        'date' => 'datetime:Y-m-d',
        'time'=>'datetime:H:i'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
    
}
