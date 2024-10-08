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
        Schema::table('sub_services', function (Blueprint $table) {
            $table->unsignedBigInteger('service_id'); // Foreign key

            // Establish foreign key relationship
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_services', function (Blueprint $table) {
            // First, drop the foreign key constraint
            $table->dropForeign(['service_id']);  // or $table->dropForeign('sub_services_service_id_foreign');

            // Then, drop the column
            $table->dropColumn('service_id');
        });
    }
};
