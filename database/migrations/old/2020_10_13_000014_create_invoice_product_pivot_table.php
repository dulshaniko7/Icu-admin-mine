<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceProductPivotTable extends Migration
{
    public function up()
    {
        Schema::create('invoice_product', function (Blueprint $table) {
            $table->unsignedInteger('invoice_id');
            $table->foreign('invoice_id', 'invoice_id_fk_2384641')->references('id')->on('invoices')->onDelete('cascade');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id', 'product_id_fk_2384641')->references('id')->on('products')->onDelete('cascade');
        });
    }
}
