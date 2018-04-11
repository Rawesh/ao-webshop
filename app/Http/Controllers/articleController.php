<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->attach(10,5);
        return view('link');
    }

   
    public function attach($article_id, $categorie_id)
    {
        $article = Article::find($article_id);
        $article->categories()->attach($categorie_id);
        $article->update();
    }
}
