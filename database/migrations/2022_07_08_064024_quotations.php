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
        Schema::create('quotations', function (Blueprint $table) {
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
            $table->string('from_city')->nullable();
            $table->text('to_city')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('quotations');
    }
};
