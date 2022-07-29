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
        Schema::create('bookingpayments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('booking_id');
            $table->decimal('price', 7, 2)->nullable();
            $table->string('date')->nullable();
            $table->string('payment_id')->nullable();
            $table->text('notes')->nullable();
            $table->integer('mode')->default(1);
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
        Schema::dropIfExists('bookingpayments');
    }
};
