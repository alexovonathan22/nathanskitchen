<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\FoodItems;
use App\Cart;
use App\Orders;
use Auth;


class CartController extends Controller
{
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request)
    {
        $id =$request->item_id;
        $food = FoodItems::find($id);

        $existingCart = Cart::where('user_id', Auth::user()->id)
                        ->where('payment_status', false)->get();
    

        if(count($existingCart) == 0){

           $cart = Cart::create([
            "user_id" => Auth::user()->id,
            "amount" => 0.00,
            "user_location" => Auth::user()->location
            ]);
        }else{
            $cart = $existingCart->first();
        }
       
        $order = new Orders;
        
        $order->user_id= Auth::user()->id;
        $order->cart_id= $cart->id;
        $order->food_item_id = $food->id;
        $order->qty = 1;
        $order->save();

        $category =  $food->category;
        $path = "";

        switch($category){
            case "breakfast": 
                $path = "/breakfast";
                break;
            case "lunch": 
                $path = "/lunch";
                break;
            default:
                 $path = "/cake";
        }
       return redirect($path);

    }

   
    public function showCart(){
        $existingCart = Cart::where('user_id', Auth::user()->id)
                        ->where('payment_status', false)->get();
    
        $cart_id = 0;
        $total = 0;

        $email = Auth::user()->email;        

        if(count($existingCart) == 0){
            $cart_items = false;
            return view('pages.cart', compact('cart_items', 'total', 'email', 'cart_id'));
        }else{
            $cart = $existingCart->first();
            $cart_id = $cart->id;
            $cart_items = Orders::join('carts', 'orders.cart_id', '=', 'carts.id')
            ->join('food_items', 'orders.food_item_id', '=', 'food_items.id')
            ->where('orders.cart_id', '=', $cart_id)
            ->select('food_items.name', 'food_items.price', 'orders.qty')
            ->get();

            
            foreach($cart_items as $item){
                $total += $item->price;
            }


            return view('pages.cart', compact('cart_items', 'total', 'email', 'cart_id'));
        }

    }

    


    public function checkout(){
        

    }

    public function handlePayment(Request $request){
        //verify if payment was successful and update the cart info in the DB
        // $reference = isset($_GET['reference']) ? $_GET['reference'] : '';
        // if(!$reference){
        //   die('No reference supplied');
        // }
    
        // // initiate the Library's Paystack Object
        // $paystack = new Yabacon\Paystack(config(PAYSTACK_SECRET_KEY));
        // try
        // {
        //   // verify using the library
        //   $tranx = $paystack->transaction->verify([
        //     'reference'=>$reference, // unique to transactions
        //   ]);
        // } catch(\Yabacon\Paystack\Exception\ApiException $e){
        //   print_r($e->getResponseObject());
        //   die($e->getMessage());
        // }
    
        // if ('success' === $tranx->data->status) {
        //   // transaction was successful...
        //   // please check other things like whether you already gave value for this ref
        //   // if the email matches the customer who owns the product etc
        //   // Give value
        // }

        $cart = Cart::find($request->input('cart_id'));
        $cart->amount = $request->input('amount');
        $cart->payment_status = 1;

        if($cart->save()){
            return "successful";
        }else{
            return "failed";
        }
        

    }

    public function orderStatus(Request $request){
        return view('pages.thankuorder');

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
