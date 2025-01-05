<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;

class CartController extends FrontEndController
{
   
    public function index()
    {
        return view('frontend.pages.cart');
    }


  
    public function update(UpdateCartRequest $request, Cart $cart)
    {
     
    }


}
