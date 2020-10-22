<?php

namespace App\Exports;

use App\Product;
use App\Student;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class StudentsExport implements FromQuery
{

    use Exportable;



    public function __construct(int $product_id){

        // $product = Product::find($id);
        $this->product_id = $product_id;

    }



    public function query()
    {

        $students = DB::select(
            'select students.first_name, students.last_name, students.email, students.contact, students.school_name
            from products
            INNER JOIN product_student
            ON products.id = product_student.product_id
            INNER JOIN students
            on product_student.student_id = students.id
            WHERE products.id = ?', [$this->product_id]);


            return $students;

    }



}
