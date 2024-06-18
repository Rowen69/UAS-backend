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

        return view('cart.cart', compact('cartItems'));
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

    public function addQuantity(Request $request, $id)
{
  
    $cartItem = Cart::findOrFail($id);
    $cartItem->quantity += 1;
    $cartItem->save();

    return redirect()->back()->with('success', 'Quantity added successfully!');
}

public function deductQuantity(Request $request, $id)
{
    $cartItem = Cart::findOrFail($id);
    $cartItem->quantity -= 1;

    if ($cartItem->quantity < 1) {
        return redirect()->back()->with('error', 'Quantity cannot be less than 1');
    }

    $cartItem->save();

    return redirect()->back()->with('success', 'Quantity deducted successfully!');
}

}

