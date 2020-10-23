<?php

namespace App\Exports;

use App\Product;
use App\Student;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;


class StudentsExport implements FromCollection
{
    use Exportable;

    public function collection()
    {
       return Student::all();
    }
    /*
    public function __construct(int $product_id)
    {
        $this->product_id = $product_id;
    }
    public function query()
    {
        return Student::query()->where('product_id',$this->product_id)->get();
    }
    */


    /*
        public function view(): View
        {
            $students = DB::select(
                'select students.first_name, students.last_name, students.email, students.contact, students.school_name
                    from products
                    INNER JOIN product_student
                    ON products.id = product_student.product_id
                    INNER JOIN students
                    on product_student.student_id = students.id
                    WHERE products.id = ?', [24]);


            return view('exports.students', [
                'students' => $students
            ]);
        }
    */
    /*
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


    */
}
