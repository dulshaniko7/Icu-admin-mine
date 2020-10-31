<?php

namespace App\Http\Controllers\Shop;

use App\Cart;
use App\Country;
use App\Exports\StudentsExport;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\TaxResource;
use App\Order;
use App\Product;
use App\Student;
use App\Tax;
use App\UploadStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Razorpay\Api\Api;
use Csv;
use Maatwebsite\Excel\Concerns\FromCollection;


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
            $tax_as_no = $p->tax_percentage;
            $tax_as_per = $tax_as_no / 100;
            $with_tax += $total * $tax_as_per;
        }

        $total_with_tax = $total + $with_tax;
        return view('shopping.checkout', ['total' => $total, 'with_tax' => $with_tax, 'total_with_tax' => $total_with_tax]);

    }

    private $razorpayId = 'rzp_test_SbaofnQKNAWbJl';
    private $razorpayKey = 'MGjkXP50JiaZD8P1EtfoOoSp';

    public function initiate(Request $request)
    {

        $receiptId = Str::random(20);

       // $api = new Api($this->razorpayId, $this->razorpayKey);
        $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));
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
            'name' => 'test',
            'currency' => 'INR',
            'email' => 'dul@gmail.com',
            'contactNumber' => '11111111',
            'address' => 'test add',
            'description' => 'Testing Description',
            'quantity' => $request->all()['quantity']
        ];

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $order = new Order();
        $order->cart = serialize($cart);
        $order->email = Auth::user()->email;
        $order->user_name = Auth::user()->name;
        $order->amount = $request->amount;
        $order->quantity = $request->quantity;
        //$order->payment_id = $payment_id;


        Auth::user()->orders()->save($order);


        return view('shopping.payment', compact('response'));
    }

    public function initiateNew(Request $request)
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
            'name' => 'test',
            'currency' => 'INR',
            'email' => 'dul@gmail.com',
            'contactNumber' => '11111111',
            'address' => 'test add',
            'description' => 'Testing Description',
            'quantity' => $request->all()['quantity']
        ];

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $order = new Order();
        // $order->cart = serialize($cart);
        $order->email = Auth::user()->email;
        $order->user_name = Auth::user()->name;
        $order->amount = $request->amount;
        $order->quantity = $request->quantity;
        //$order->payment_id = $payment_id;
        $product = Product::find($request->product_id);

        Auth::user()->orders()->save($order);
        $product->orders()->save($order);

        return view('shopping.payment', compact('response'));
    }

    public function payment(Request $request)
    {

        $signatureStatus = $this->signatureVerify(
            $request->all()['rzp_signature'],
            $request->all()['rzp_orderid'],
            $request->all()['rzp_paymentid'],
        );

        $payment_id = $request['rzp_paymentid'];
        $order_id = $request['rzp_orderid'];
        $signature = $request['rzp_signature'];


        if ($signatureStatus == true) {
            Session::forget('cart');
            // return view('shopping.payment-success-page', compact('payment_id', 'order_id', 'signature'));
            return view('home');
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
            return $e;
        }
    }

    public function assignCreate($id)
    {
        $product = Product::find($id);
        $students = Student::all();
        return view('student.assign', compact('students', 'product'));
    }

    public function assignStore(Request $request)
    {

        $product_id = $request->product_id;
        $product = Product::find($product_id);

        $product->update($request->all());

        $product->students()->sync($request->input('students', []));

        $students = $product->students()->get();

        return view('stu.export')->with('students', $students)->with('product', $product);


    }

    public function exportData($id)
    {

        return (new StudentsExport($id))->download('student.csv');
    }

    public function getReduceByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('user.cart');
    }

    public function getRemoveItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('user.cart');
    }


    public function importFile($qty)
    {
        $order_qty = $qty;
        return view('import.student-list', compact('order_qty'));
    }

    public function importCsv(Request $request)
    {

        $qty = $request->order_qty;

        $validator = Validator::make($request->all(), [
            'file' => 'required'
        ]);


        if ($validator->passes()) {
            $dataTime = date('Ymd_His');
            $file = $request->file('file');

            $fileName = $dataTime . '-' . $file->getClientOriginalName();
            $savePath = public_path('/upload/');
            $file->move($savePath, $fileName);
            return redirect()->back()->with(['success' => 'File uploaded successfully.']);
        } else {
            return redirect()->back()->with(['errors' => $validator->errors()->all()]);
        }
    }

    public function storeNewCheckout(Request $request)
    {
        $q = $request->qty;
        $p = $request->price;
        $product_id = $request->product_id;
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


        $with_tax = 0;

        $total = $p * $q;

        for ($i = 0; $i < count($tax_percentages); $i++) {

            $p = $tax_percentages[$i];
            $tax_as_no = $p->tax_percentage;
            $tax_as_per = $tax_as_no / 100;
            $with_tax += $total * $tax_as_per;
        }

        $total_with_tax = $total + $with_tax;

        return view('shopping.checkout', ['total' => $total, 'with_tax' => $with_tax, 'total_with_tax' => $total_with_tax, 'quantity' => $q, 'product_id' => $product_id]);

    }

    public function viewProduct($order)
    {
        $o = Order::find($order);
        $q = $o->quantity;
       $quantity = $q;
        $p = $o->product_id;
        $product = Product::find($p);
        $students = UploadStudent::where('order_id', $order)->get();

        return view('client.productShow', compact('product', 'o', 'students','quantity'));
    }


}


