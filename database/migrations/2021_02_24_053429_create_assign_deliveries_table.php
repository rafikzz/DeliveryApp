<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_deliveries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('delivery_id');
            $table->foreign('delivery_id')->references('id')->on('deliveries')->onDelete('cascade')->onEdit('cascade');
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade')->onEdit('cascade');
            $table->unsignedBigInteger('vehicle_id')->nullable();
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade')->onEdit('cascade');

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
        Schema::dropIfExists('assign_deliveries');
    }
}
