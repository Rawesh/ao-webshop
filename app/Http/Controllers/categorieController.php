<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->attach(1,1);
    }

    public function attach($article_id, $categorie_id)
    {
        $categorie = Categorie::find($categorie_id);
        $categorie->articles()->attach($article_id);
        $categorie->update();
    }

}
