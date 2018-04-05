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
        $this->attach(2,1);
    }

    //create article
    // public function create()
    // {
    //     return view('createarticle');
    // }

    // //createsave article
    // public function createSave( Request $request)
    // {
    //     $this->validate($request, [
    //         'name' => 'required',
    //         'price' => 'required',
    //         'description' => 'required'
    //     ]);
        
    //     $article = new article;
    //     $article->name = $request->input('name');
    //     $article->price = $request->input('price');
    //     $article->description = $request->input('description');

    //     return redirect('/homepage')->with('succes', 'Post Created');
    // }
   
    public function attach($article_id, $categorie_id)
    {
        $article = Article::find($article_id);
        $article->categories()->attach($categorie_id);
        $article->update();
    }
}
