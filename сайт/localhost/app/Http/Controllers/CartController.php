<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tovar;
use App\Models\Cart;
use App\Models\User;
use App\Models\Category;

class CartController extends Controller
{
    public function cartShow()
    {
        $user = Auth::user();
        $cartItems = [];
        $total = 0;

        if ($user) {
            // Get the cart for authenticated user
            $cart = $user->cart()->with('tovars')->first();

            if ($cart) {
                $cartItems = $cart->tovars;

                foreach ($cartItems as $tovar) {
                    $total += $tovar->pivot->price * $tovar->pivot->amount;
                }
            }
        }

        return view('cart', compact('cartItems', 'total', 'user'));
    }



    public function add(Request $request)
    {
        if (Auth::check()) {
            $this->addToUserCart($request);
        } else {
            $this->addToSessionCart($request);
        }

        return redirect()->back();
    }
    private function addToUserCart(Request $request)
    {
        $user = Auth::user();
        $cart = $user->cart ?? Cart::create(['user_id' => $user->id]);
        $quantity = (int) $request->quantity;
        $tovarId = $request->tovar_id;

        if ($this->canAddToCart($cart, $tovarId, $quantity)) {
            $tovar = $cart->tovars()->where('tovars.id', $tovarId)->first();

            if ($tovar) {
                $cart->tovars()->updateExistingPivot($tovarId, [
                    'amount' => $tovar->pivot->amount + $quantity
                ]);
            } else {
                $tovar = Tovar::findOrFail($tovarId);
                $price = $tovar->price;

                $cart->tovars()->attach($tovarId, [
                    'price' => $price,
                    'amount' => $quantity
                ]);
            }
        }
    }
    private function canAddToCart($cart, $tovarId, $quantity)
    {
        $tovar = $cart->tovars()->where('tovars.id', $tovarId)->first();

        if ($tovar && $tovar->pivot->amount >= $tovar->amount) {
            return false;
        }

        return true;
    }
    private function addToSessionCart(Request $request)
    {
        $tovar_id = $request->input('tovar_id');
        $quantity = (int) $request->input('quantity', 1);

        $tovar = Tovar::find($tovar_id);

        $cart = $request->session()->get('cart', []);

        if (isset($cart[$tovar_id])) {
            $cart[$tovar_id]['quantity'] += $quantity;
            $cart[$tovar_id]['amount'] += $tovar->price * $quantity; // Update the amount
        } else {
            $cart[$tovar_id] = [
                'id' => $tovar_id,
                'name' => $tovar->name,
                'price' => $tovar->price,
                'quantity' => $quantity,
                'amount' => $tovar->price * $quantity, // Calculate the amount
            ];
        }

        $request->session()->put('cart', $cart);
    }

    public function deleteFromCart(Tovar $tovar)
    {
        // Находим текущую корзину пользователя
        $cart = auth()->user()->cart;

        // Удаляем товар из связи "многие ко многим" с помощью метода detach
        $cart->tovars()->detach($tovar->id);

        return redirect()->back()->with('success', 'Товар успешно удален из корзины.');
    }
}