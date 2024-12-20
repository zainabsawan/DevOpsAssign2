<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name', 255);
            $table->string('Email', 30);
            $table->string('Password', 10);
            $table->string('Phone', 20)->nullable();
            $table->text('Address')->nullable();
            $table->string('ccName', 30)->nullable();
            $table->text('ccNumber')->nullable();
            $table->string('ccExpiration', 5)->nullable();
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
        Schema::dropIfExists('customers');
    }
}
