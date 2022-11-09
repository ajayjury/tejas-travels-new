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
        Schema::create('tripsheet', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('booking_id');
            $table->bigInteger('transporter_id')->nullable();
            $table->bigInteger('transporter_driver_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('minimum_km')->nullable();
            $table->string('opening_km')->nullable();
            $table->string('closing_km')->nullable();
            $table->string('running_km')->nullable();
            $table->string('amount_paid_to_driver')->nullable();
            $table->string('amount_pending_from_driver')->nullable();
            $table->string('amount_paid_to_customer')->nullable();
            $table->string('amount_pending_from_customer')->nullable();
            $table->string('total_amount_collected')->nullable();
            $table->string('total_earning')->nullable();
            $table->string('diesel_cost')->nullable();
            $table->string('inter_state_tax')->nullable();
            $table->string('toll_parking')->nullable();
            $table->string('driver_batta')->nullable();
            $table->string('driver_night_batta')->nullable();
            $table->string('rent_price')->nullable();
            $table->string('pending_to_transporter')->nullable();
            $table->string('pending_from_transporter')->nullable();
            $table->json('amount_note')->nullable();
            $table->string('paid_to')->nullable();
            $table->string('tripsheettype')->nullable();
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
        Schema::dropIfExists('tripsheet');
    }
};
