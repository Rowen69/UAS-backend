<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Baju;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('baju')->get();

        return view('cart.index', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        $baju_id = $request->baju_id;
        $quantity = $request->quantity;

        $cartItem = Cart::where('baju_id', $baju_id)->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            Cart::create([
                'baju_id' => $baju_id,
                'quantity' => $quantity,
            ]);
        }

        return redirect()->back()->with('success', 'Item added to cart successfully!');
    }

    public function removeFromCart($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        return redirect()->back()->with('success', 'Item removed from cart successfully!');
    }
}

