<?php

namespace App\Http\Controllers\Upload;

use App\Http\Controllers\Controller;
use App\Order;
use App\UploadStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            for ($i = 0; $i < $quantity; $i++) {
                $firstname = $data['firstname'];
                $lastname = $data['lastname'];
                $email = $data['email'];
                $contact = $data['contact'];
                $school = $data['schoolname'];

                $upStudent = UploadStudent::firstOrNew(['email' => $email, 'first_name' => $firstname]);
                $upStudent->first_name = $firstname;
                $upStudent->last_name = $lastname;
                $upStudent->email = $email;
                $upStudent->contact = $contact;
                $upStudent->school_name = $school;
                $upStudent->order_id = $order_id;
                $upStudent->product_id = $product_id;
                $upStudent->save();
            }


        }
        return view('client.purchases',compact('orders'));
    }
}
