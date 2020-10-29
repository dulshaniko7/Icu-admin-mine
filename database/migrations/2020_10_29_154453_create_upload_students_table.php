<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('email',100);
            $table->string('contact',100);
            $table->string('school_name',100);
            $table->unsignedInteger('product_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upload_students');
    }
}
