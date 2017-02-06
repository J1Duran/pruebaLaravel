<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->integer('customerNumber');
            $table->string('customerName');
            $table->string('contactLastName');
            $table->string('contactFirstName');
            $table->string('phone');
            $table->string('adressLine1');
            $table->string('adressLine2');
            $table->string('city');
            $table->string('state');
            $table->string('postalCode');
            $table->string('country');
            $table->integer('salesRepEmployeeNumber');
            $table->double('creditLimit', 15, 2);
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
