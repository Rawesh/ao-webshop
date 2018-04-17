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
        $inv = $request->session()->get("inventory");

        $exists = false;

        //check if exist
        if (is_array($inv) || is_object($inv))
        {
            foreach ($inv as $value)
            {
                if($value == $article_id)
                {
                    $exists = true;
                }
            }

        }
        else
        {
            $request->session()->push("inventory", $article_id);
            return redirect('/home');
        }

        if ($exists == false)
        {
            $request->session()->push("inventory", $article_id);
        }
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
        //show articles
        if (is_array($data) || is_object($data))
        {
            foreach ($data as $id)
            {
                $item[] = Article::find($id);// article table search id
            }
        }

        // set total price
        
        // $inputTotal = $request->input('total');

        // $total=0;

        // for ($i=0; count($item) > $i; $i++)
        // { 
        //     $total = $total + intval($item[$i]->price);
        // }
        

        // $inputTotal = $total;



        return view("content/shoppingcard",compact('item','inputTotal'));
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
