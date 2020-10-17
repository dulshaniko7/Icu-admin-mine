<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCustomersTable extends Migration
{
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->unsignedInteger('country_id');
            $table->foreign('country_id', 'country_fk_2384658')->references('id')->on('countries');
        });
    }
}
