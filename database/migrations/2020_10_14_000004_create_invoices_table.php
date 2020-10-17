<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('price', 15, 2);
            $table->decimal('total_tax', 15, 2)->nullable();
            $table->decimal('total_price', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
