<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
     /**
     * The articles that belong to the shop.
     */
    public function articles()
    {
         return $this->belongsToMany('App\Article');
    }
    protected $table="categorie";
}
