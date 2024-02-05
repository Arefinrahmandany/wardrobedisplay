<?php

namespace App\Http\Controllers\Front\Cart;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $subtotal = 0;
        $cart_data = Cart::all();

        foreach ($cart_data as $data) {
            $subtotal += $data->quantity * ($data->product->discount_price ?: $data->product->price);
        }
        return view('Front.cart',[
            'cart_data' => $cart_data,
            'subtotal' => $subtotal,
        ]);
    }

    public function addCart(string $id)
    {
        $product_id = $id;
        $user_id = Auth::guard('user')->user()->id;

        Cart::create([
            'user_id'       =>$user_id,
            'product_id'    =>$product_id,
        ]);
        return back();
    }

    public function addQuantity(Request $request, string $id)
    {
        $cartItem = Cart::findOrFail($id);
        // Increment the quantity by 1
        $newQuantity = $cartItem->quantity + 1;
        // Update the quantity in the database
        $cartItem->update([
            'quantity' => $newQuantity,
        ]);

        return back();
    }

    public function minusQuantity(Request $request, string $id)
    {
        $cartItem = Cart::findOrFail($id);
        // Increment the quantity by 1
        $newQuantity = $cartItem->quantity - 1;
        // Update the quantity in the database
        $cartItem->update([
            'quantity' => $newQuantity,
        ]);

        return back();
    }

    public function destroy(string $id)
    {
        $delete = Cart::findorFail($id);
        $delete ->delete();

        return back();
    }


}
