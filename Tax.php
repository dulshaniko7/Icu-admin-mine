<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tax extends Model
{
    use SoftDeletes;

    public $table = 'taxes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'tax_name',
        'tax_percentage',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function countries()
    {
        return $this->belongsToMany(Country::class,'country_tax');
    }
}
