<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    protected $fillable = [
        'user_id', 'title','text','file','closed_at','viewed_at','working'
    ];

    public function orderMessages()
    {
        return $this->hasMany(OrderMessage::class,'order_id','id');
    }
    public function orderUser()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
