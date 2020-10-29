<?php

namespace App\Http\Controllers\Upload;

use App\Http\Controllers\Controller;
use App\UploadStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UploadStudentController extends Controller
{
    public function create($id)
    {
        $product_id = $id;

        return view('import.student-list',compact('product_id'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'file' => 'required'
        ]);


        $dataTime = date('Ymd_His');
        $file1 = $request->file('file');
        $filePath = $file1->getRealPath();
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
            if ($columns[0] == "") {
                continue;
            }

            $data = array_combine($escapedHeader, $columns);

            // Table update
            $firstname = $data['firstname'];
            $lastname = $data['lastname'];
            $email = $data['email'];
            $contact = $data['contact'];
            $school = $data['schoolname'];

            $upStudent = new UploadStudent();
            $upStudent->first_name = $firstname;
            $upStudent->last_name = $lastname;
            $upStudent->email = $email;
            $upStudent->contact = $contact;
            $upStudent->school_name = $school;
            $upStudent->save();
            return redirect()->back()->with(['success' => 'File uploaded successfully.']);


        }
    }
}
