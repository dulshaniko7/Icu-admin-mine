<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryTaxPivotTable extends Migration
{
    public function up()
    {
        Schema::create('country_tax', function (Blueprint $table) {
            $table->unsignedInteger('tax_id');
            $table->foreign('tax_id', 'tax_id_fk_2384633')->references('id')->on('taxes')->onDelete('cascade');
            $table->unsignedInteger('country_id');
            $table->foreign('country_id', 'country_id_fk_2384633')->references('id')->on('countries')->onDelete('cascade');
        });
    }
}
