<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;

class OrderController extends Controller
{
    //
    public function placeOrder(Request $request)
    {
        $user = $request->user();
        $cart = $user->cart()->with('tovars')->first();

        $order = new Order();
        $order->cart_id = $cart->id;
        $order->user_id = $user->id;
        $order->status = 0;
        $order->save();

        $newCart = new Cart();
        $newCart->user_id = $user->id;
        $newCart->save();

        return redirect('/');
    }
}