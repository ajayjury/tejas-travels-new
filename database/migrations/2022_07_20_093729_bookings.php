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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->bigInteger('triptype_id')->nullable();
            $table->string('triptype')->nullable();
            $table->bigInteger('subtriptype_id')->nullable();
            $table->string('subtriptype')->nullable();
            $table->bigInteger('vehicletype_id')->nullable();
            $table->string('vehicletype')->nullable();
            $table->bigInteger('vehicle_id')->nullable();
            $table->bigInteger('packagetype_id')->nullable();
            $table->string('packagetype')->nullable();
            $table->string('from_date')->nullable();
            $table->string('to_date')->nullable();
            $table->string('from_time')->nullable();
            $table->string('to_time')->nullable();
            $table->bigInteger('from_city_id')->nullable();
            $table->string('from_city')->nullable();
            $table->text('to_city')->nullable();
            $table->string('from_latitude')->nullable();
            $table->string('to_latitude')->nullable();
            $table->string('from_longitude')->nullable();
            $table->string('to_longitude')->nullable();
            $table->string('pickup_address')->nullable();
            $table->string('pickup_time')->nullable();
            $table->string('pickup_latitude')->nullable();
            $table->string('pickup_longitude')->nullable();
            $table->text('trip_distance')->nullable();

            $table->text('discount_notes')->nullable();
            $table->text('discount_notes_formatted')->nullable();
            $table->text('extra_charge_notes')->nullable();
            $table->text('extra_charge_notes_formatted')->nullable();
            $table->text('terms_condition')->nullable();
            $table->text('terms_condition_formatted')->nullable();
            $table->decimal('extra_charge', 7, 2)->nullable();
            $table->decimal('final_amount', 7, 2)->nullable();
            $table->decimal('pending_amount', 7, 2)->nullable();
            $table->decimal('discount', 7, 2)->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('bookings');
    }
};
