<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->increments('id');
            $table->float('discount_percentage', 15, 2)->nullable();
            $table->string('discount_name');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
