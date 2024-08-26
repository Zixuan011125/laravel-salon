<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id'); // Foreign key
            $table->unsignedBigInteger('product_id'); // Foreign key

            // Establish foreign key relationship
            $table->foreign('customer_id')->references('id')->on('customer')->onDelete('restrict');

            // Establish foreign key relationship
            $table->foreign('product_id')->references('id')->on('products')->onDelete('restrict');

            $table->integer('quantity_sold');
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
        Schema::dropIfExists('customers_products');
    }
};
