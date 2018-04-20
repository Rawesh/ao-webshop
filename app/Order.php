<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = [
        'client_id', 'id',
    ];

    public function order_details()
    {
         return $this->belongsToMany('App\Order_detail');
    }

    protected $table="orders";
}
