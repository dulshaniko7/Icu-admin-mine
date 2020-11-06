<?php

namespace App\Http\Controllers\Upload;

use App\Http\Controllers\Controller;
use App\Mail\SubscribeMail;
use App\Order;
use App\Product;
use App\UploadStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UploadStudentController extends Controller
{
    public function create($id)
    {
        //  $product_id = $id;
        $order_id = $id;


        return view('import.student-list', compact('order_id'));
    }

    public function store(Request $request)
    {
        $orders = Auth::user()->orders;
        $order_id = $request->order_id;

        //get product of the order
        $order = Order::find($order_id);
        $quantity = $order->quantity;

        $product_id = $order->product_id;

        $product = Product::find($product_id);

        $product_name = $product->product_name;

        $validator = Validator::make($request->all(), [
            'file' => 'required'
        ]);


        $dataTime = date('Ymd_His');
        $upload = $request->file('file');
        $filePath = $upload->getRealPath();
        $file = fopen($filePath, 'r');

        $header = fgetcsv($file);


        //validation
        $escapedHeader = [];

        foreach ($header as $key => $value) {
            $lheader = strtolower($value);
            $escapedItem = preg_replace('/[^a-z]/', '', $lheader);

            array_push($escapedHeader, $escapedItem);
        }


        while ($columns = fgetcsv($file)) {

            foreach ($columns as $key => &$value) {
                $value = $value;
            }


            $data = array_combine($escapedHeader, $columns);


            // Table update
            for ($i = 0; $i < $quantity / $quantity; $i++) {
                $firstname = $data['firstname'];
                $lastname = $data['lastname'];
                $email = $data['email'];
                $contact = $data['contact'];
                $school = $data['schoolname'];

                // $upStudent = UploadStudent::firstOrNew(['email' => $email, 'first_name' => $firstname]);
                $upStudent = new UploadStudent();
                $upStudent->first_name = $firstname;
                $upStudent->last_name = $lastname;
                $upStudent->email = $email;
                $upStudent->contact = $contact;
                $upStudent->school_name = $school;
                $upStudent->order_id = $order_id;
                $upStudent->product_id = $product_id;
                $upStudent->save();


                Mail::to($upStudent->email)->send(new SubscribeMail($upStudent, $product));
                sleep(3);
            }


        }
        return view('client.purchases-new', compact('orders'));
    }

    public function email(Request $request, $id)
    {
        $order = Order::find($id);
        $p = $order->product_id;
        $product = Product::find($p);

        $studentIds = $request->all();

        $students = $studentIds['select'];

        $count = count($students);

        for ($i = 0; $i < $count; $i++) {
            $id = $students[$i];
            $student = UploadStudent::find($id);

            Mail::to($student->email)->send(new SubscribeMail($student, $product));
            sleep(3);
        }

        return redirect()->route('user.product.details', $order);
    }
}
