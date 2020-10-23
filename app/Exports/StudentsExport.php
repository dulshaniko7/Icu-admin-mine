<?php

namespace App\Exports;

use App\Product;
use App\Student;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;


class StudentsExport implements FromView
{
    use Exportable;

    public function __construct(int $id)
    {
        $this->product_id = $id;
    }


    public function view(): View
    {
        $product = Product::find($this->product_id);
        return view('stu.export', [
            'students' => $product->students()->get()]);
    }

}
