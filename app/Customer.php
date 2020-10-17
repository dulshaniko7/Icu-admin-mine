<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    public $table = 'customers';

    protected $hidden = [
        'password',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'customer_name',
        'email',
        'password',
        'remember_token',
        'country_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function customerInvoices()
    {
        return $this->hasMany(Invoice::class, 'customer_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
