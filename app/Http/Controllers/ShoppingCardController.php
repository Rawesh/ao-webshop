<?php

namespace App\Http\Controllers;
use App\Article;
use App\ShoppingCard;
use Illuminate\Http\Request;

class ShoppingCardController extends Controller
{

    private $items;

   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request, $article_id)
    { 
        $request->session()->push("inventory", $article_id);
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShoppingCard  $shoppingCard
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = $request->session()->get('inventory');
        $item = [];

        foreach ($data as $id)
        {
            $item[] = Article::find($id);    
        }

        return view("content/shoppingcard",compact('item'));
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShoppingCard  $shoppingCard
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $item_id)
    {
        $data = $request->session()->forget('inventory', $item_id);

        return redirect('/home'); 
    }
}
