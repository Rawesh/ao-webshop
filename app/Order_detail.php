<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
	protected $fillable = [
        'article_id', 'amount', 'order_id',
    ];
}
