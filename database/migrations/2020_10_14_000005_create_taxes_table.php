<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxesTable extends Migration
{
    public function up()
    {
        Schema::create('taxes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tax_name');
            $table->float('tax_percentage', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
