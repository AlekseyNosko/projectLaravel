<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderMessage extends Model
{
    protected $table = 'order_messages';

    protected $fillable = [
        'order_id', 'user_id','text'
    ];

    public function messageOrder()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }
    public function messageUser()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
