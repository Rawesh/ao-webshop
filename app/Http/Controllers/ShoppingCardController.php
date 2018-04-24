<?php

namespace App\Http\Controllers;
use App\Article;
use App\Client;
use App\Order;
use Auth;
use App\Order_detail;
use App\ShoppingCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    /**
    * Order the articles 
    **/
    public function order(Request $request)
    {
        // get articles in shoppingcard
        $articles = $request->session()->get("inventory");

        //get user
        $user = Auth::user();
        
        // relate user to client
        $client = $user->client;

        //create order whit the client id
        $order = Order::create([
            'client_id' => $client->id,
        ]);

        //make order detail for one article
        foreach ($articles as $article)
        {
            $order_detail = Order_detail::create([
            'article_id' => $article,
            'amount' => $request->input('amount' . $article),
            'order_id' => $order->id,
            ]);
        }

        // when make order shoppingcart is empty
        $inventory = $request->session()->forget('inventory');

         return redirect('/home'); 
    }

    public function myOrders(Request $request)
    {
         //get user
        $user = Auth::user();
        
        // relate user to client
        $client = $user->client;

        // relate client to order
        $orders = $client->orders;

        $order_details = [];

        foreach ($orders as $order)
        {
            $order_details[] = $order->order_details;
        }


        //get name of id
        foreach ($order_details as $details)// the orders
        {
            foreach ($details as $detail)// one order
            {
                // set order article id in article name
                $articles = Article::find($detail->article_id);
                $detail->article_id= $articles->name;
            }
        }
        
        //dd(Article::find($order_details[2][0]->article_id)->name);

        return view('content/myorders', [
            'order' => $order_details
        ])->with('articles', $articles);        
    }
}
