<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->string('productCode');
            $table->string('productName');
            $table->string('productLine');
            $table->string('productScale');
            $table->string('productVendor');
            $table->text('productDescription');
            $table->smallInteger('quantityInStock');
            $table->double('buyPrice', 15, 2);
            $table->double('MSRP', 15, 2);
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
        Schema::dropIfExists('products');
    }
}
