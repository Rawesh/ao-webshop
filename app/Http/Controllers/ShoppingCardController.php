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
        $data = $request->session()->get('inventory');// array articles
        $item = [];

        if (is_array($data) || is_object($data))
        {
            foreach ($data as $id)
            {
                $item[] = Article::find($id);// article table search id
            }
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
        // get the array
        $inventory = $request->session()->get('inventory');

        // cheack the array place
        for ($i=0; count($inventory) > $i ;$i++)
        {
            if ($inventory[$i] === $item_id)
            {
                array_splice($inventory, $i, 1);// 3 arguments : 1= array 2=place 3=how many delete
            }    
        }

        // empty yhe array
        $request->session()->flush('inventory');

        // if nut null set array
        if ($inventory  !== null)
        {
            $request->session()->put('inventory', $inventory);
        }

        return redirect('/shoppingcard'); 
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShoppingCard  $shoppingCard
     * @return \Illuminate\Http\Response
     */
    public function deleteAll(Request $request)
    {
        $inventory = $request->session()->forget('inventory');

        return redirect('/shoppingcard'); 
    }
}
