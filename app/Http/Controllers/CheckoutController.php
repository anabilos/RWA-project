<?php

namespace App\Http\Controllers;

use  Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
use App\Order;
use App\Product;
use App\OrderProduct;
class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(){
       return view('checkout');
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckoutRequest $request)
    {
      $order = Order::create([
         'user_id' => auth()->user() ? auth()->user()->id : null,
         'billing_firstname' => $request->firstname,
         'billing_lastname' => $request->lastname,
         'billing_address' => $request->address,
         'billing_city' => $request->city,
         'billing_state' => $request->city,
         'billing_phone' => $request->phone,
         'billing_email' => $request->email,
         'billing_total' => Cart::total(),
         'billing_subtotal' => Cart::subtotal(),
         'billing_tax' => Cart::tax(),
         'error' =>  null,
      ]);

      foreach (Cart::content() as $item) {
       OrderProduct::create([
           'order_id' => $order->id,
           'product_id' => $item->model->id,
           'quantity' => $item->qty,

       ]);
      }

      Cart::instance('default')->destroy();


             return redirect()->route('confirmation.index')->with('success_message', 'Thank you! Your payment has been successfully accepted!');
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
