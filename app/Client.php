<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	/**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name', 'adress', 'user_id',
    ];

   public function orders()
    {
         return $this->hasMany('App\Order');
    }
    
    protected $table="clients";
}
