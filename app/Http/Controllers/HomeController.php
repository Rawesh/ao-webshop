<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')->get();
        $articles = DB::table('articles')->simplepaginate(5);


        return view('content/index', [
            'categories' => $categories,
            'articles' => $articles
        ]);
    }


    public function getArticlesByCategorie($category_id)
    {
        $articles = DB::table('article_categorie')
                    ->select('name', 'price', 'description')
                    ->join('articles', 'id', 'article_id')
                    ->where('categorie_id', $category_id)
                    ->simplepaginate(5);

        $category = DB::table('categories')
                    ->where('id', $category_id)
                    ->get();


        return view('content/category_articles', ['articles' => $articles])->withcategory($category);
    }
}
