<?php

namespace App\Http\Controllers\Client;

use App\Cart;
use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\TaxResource;
use App\Product;
use App\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $user = auth()->user();
        $country = $user->country;
        $country_id = $country->id;

        $t = TaxResource::collection(
            Tax::all()
        );
      //  $tax = $country->countryTaxes();

        $tax_percentage = $t[0]['tax_percentage'];


        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart'));
        return redirect()->route('user.home');

    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('client.cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('client.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout()
    {

        $user = auth()->user();
        $country = $user->country;
        $country_id = $country->id;

        $t = TaxResource::collection(
            Tax::all()
        );
        $tax = $country->countryTaxes();

        $tax_percentage = $t[0]['tax_percentage'];
        if (!Session::has('cart')) {
            return view('client.cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        $with_tax = $total * $tax_percentage;
        return view('client.checkout', ['total' => $total, 'with_tax' => $with_tax]);

    }

}
