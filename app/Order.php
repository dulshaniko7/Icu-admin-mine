<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function students(){
        return $this->hasMany(Student::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

}
