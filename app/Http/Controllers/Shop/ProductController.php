<?php

namespace App\Http\Controllers\Shop;

use App\Cart;
use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\TaxResource;
use App\Product;
use App\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Razorpay\Api\Api;

class ProductController extends Controller
{
    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $user = auth()->user();
        $country = $user->country;
        $country_id = $country->id;
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);

        return redirect()->route('user.home');

    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('shopping.cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shopping.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout()
    {

        $user = auth()->user();
        $country = $user->country;
        $country_id = $country->id;

        $t = TaxResource::collection(
            Tax::all()
        );

        $tax_percentages = DB::select(
            'select taxes.tax_percentage
            from countries
            INNER JOIN country_tax
            ON countries.id = country_tax.country_id
            INNER JOIN taxes
            on country_tax.tax_id = taxes.id
            WHERE countries.id = ?', [$country_id]);


        $tax = $country->countryTaxes();

        if (!Session::has('cart')) {
            return view('shopping.cart');
        }


        $with_tax = 0;
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        for ($i = 0; $i < count($tax_percentages); $i++) {

            $p = $tax_percentages[$i];
            $with_tax += $total * $p->tax_percentage;
        }

        $total_with_tax = $total + $with_tax;
        return view('shopping.checkout', ['total' => $total, 'with_tax' => $with_tax, 'total_with_tax' => $total_with_tax]);

    }

    private $razorpayId = 'rzp_test_SbaofnQKNAWbJl';
    private $razorpayKey = 'MGjkXP50JiaZD8P1EtfoOoSp';

    public function initiate(Request $request)
    {

        $receiptId = Str::random(20);

        $api = new Api($this->razorpayId, $this->razorpayKey);
        $order = $api->order->create(array(
                'receipt' => $receiptId,
                'amount' => $request->all()['amount'] * 100,
                'currency' => 'INR'
            )
        );

        $response = [
            'orderId' => $order['id'],
            'razorpayId' => $this->razorpayId,
            'amount' => $request->all()['amount'] * 100,
            'name' => $request->all()['name'],
            'currency' => 'INR',
            'email' => $request->all()['email'],
            'contactNumber' => $request->all()['contactNumber'],
            'address' => $request->all()['address'],
            'description' => 'Testing Description'
        ];

        return view('shopping.payment', compact('response'));
    }

    public function payment(Request $request)
    {

        $signatureStatus = $this->signatureVerify(
            $request->all()['rzp_signature'],
            $request->all()['rzp_orderid'],
            $request->all()['rzp_paymentid'],
        );

        if ($signatureStatus == true) {
            return view('shopping.payment-success-page');
        } else {
            return view('shopping.payment-failed-page');
        }
    }

    public function signatureVerify($_signature, $_paymentId, $_orderId)
    {
        try {
            $api = new Api($this->razorpayId, $this->razorpayKey);
            $attributes = array('razorpay_signature' => $_signature, 'razorpay_payment_id' => $_paymentId, 'order_id' => $_orderId);
            $order = $api->utility->verifyPaymentSignature($attributes);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

}
