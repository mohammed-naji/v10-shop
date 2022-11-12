<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
        $quantity = $request->input('product-quantity');

        $product = Product::find($request->product_id);

        $cart = Cart::where('user_id', Auth::id())->where('product_id', $request->product_id)->first();

        // dd($cart);
        if($cart) {
            $cart->update(['quantity' => $cart->quantity + $quantity]);
        }else {
            Cart::create([
                'user_id' => $request->user_id,
                'product_id' => $request->product_id,
                'quantity' => $quantity,
                'price' => $product->sale_price ? $product->sale_price : $product->price
            ]);
        }

        return redirect()->back()->with('msg', 'Product added to cart');
    }

    public function cart()
    {
        return view('site.cart');
    }

    public function remove_cart($id)
    {
        Cart::destroy($id);

        return redirect()->back();
    }

    public function checkout()
    {
        $amount = Auth::user()->carts()->sum(DB::raw('quantity * price'));

        // dd($amount);

        $url = "https://eu-test.oppwa.com/v1/checkouts";
        $data = "entityId=8a8294174b7ecb28014b9699220015ca" .
                    "&amount=$amount" .
                    "&currency=USD" .
                    "&paymentType=DB";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData = json_decode($responseData, true);

        // dd($responseData);

        $id = $responseData['id'];

        return view('site.checkout', compact('id'));
    }
}
