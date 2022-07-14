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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('ride_type');
            $table->string('customer_type');
            $table->string('use_type');
            $table->integer('no_of_use');
            $table->integer('min_invoice_amount');
            $table->string('discount_type');
            $table->decimal('discount', 7, 2);
            $table->integer('max_discount');
            $table->text('terms_condition')->nullable();
            $table->text('terms_condition_formatted')->nullable();
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
        Schema::dropIfExists('coupons');
    }
};
