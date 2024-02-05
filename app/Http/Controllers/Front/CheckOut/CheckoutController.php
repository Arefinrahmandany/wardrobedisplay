<?php

namespace App\Http\Controllers\Front\CheckOut;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function index()
    {
        $user_id = Auth::guard('user')->user()->id;
    $user = User::findOrFail($user_id);

    $cart_items = Cart::where('user_id', $user_id)->get();

    $total_ordered_price = 0;

    foreach ($cart_items as $cart_item) {
        $total_ordered_price += $cart_item->discount_price ? $cart_item->discount_price : $cart_item->price;
    }

    $cart_data = $cart_items;

    return view('Front.checkout', [
        'cart_data' => $cart_data,
        'user' => $user,
        'total_ordered_price' => $total_ordered_price
    ]);
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'fName'     => 'required|string',
            'email'     => 'required|string',
            'cell'      => 'required|string',
            'address'   => 'required|string',
            'payment'   => 'required',
        ]);

        $user_id = Auth::guard('user')->user()->id;

        // Decode the JSON string to an array
        $products = json_decode($request->products, true);

        // Create a new checkout
        $checkout = Checkout::create([
            'user_id'       => $user_id,
            'fName'         => $request->fName,
            'email'         => $request->email,
            'cell'          => $request->cell,
            'address'       => $request->address,
            'payment'       => $request->payment,
            'total_price'   => $request->totalPrice,
            'shipping_cost' => $request->shippingCost,
            'grand_total'   => $request->grandTotal,
        ]);

        // associate the items with the checkout
        foreach ($products as $productData) {
            $checkout->items()->create([
                'quantity'      => $productData['quantity'],
                'product_name'  => $productData['product']['product_name'],
                'price'         => !empty($productData['product']['discount_price']) ? $productData['product']['discount_price'] : $productData['product']['price'],
            ]);

            $productsData[] = [
                'product_name' => $productData['product']['product_name'],
                'price'        => !empty($productData['product']['discount_price']) ? $productData['product']['discount_price'] : $productData['product']['price'],
                'quantity'     => $productData['quantity'],
                'total'        => $productData['quantity'] * (!empty($productData['product']['discount_price']) ? $productData['product']['discount_price'] : $productData['product']['price']),
            ];


        }

         // Prepare data for email
        $mailData = [
            'fName'       => $request->fName,
            'cell'        => $request->cell,
            'address'     => $request->address,
            'payment'     => $request->payment,
            'Order ID'    => $checkout->id,
            'Order Date'  => now(),
            'products'    => $productsData,
            'subTotal'    => $request->totalPrice,
            'shippingCost'=> $request->shippingCost,
            'grandTotal'  => $request->grandTotal,
        ];

        Mail::to($request->email)
        ->cc('wardrobedisplay.og@gmail.com')
        ->send(new OrderMail($mailData));

        //destroy all cart data which associate with logged user
        Cart::where('user_id',$user_id)->delete();

        return redirect()->route('home.index');
    }


}
