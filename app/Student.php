<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];

/*
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
*/
    public function products(){
        return $this->belongsToMany(Product::class,'product_student','student_id','product_id');
    }
}
