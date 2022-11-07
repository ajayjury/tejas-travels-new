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
        Schema::table('bookings', function (Blueprint $table) {
            $table->decimal('extra_charge', 10, 2)->nullable()->change();
            $table->decimal('final_amount', 10, 2)->nullable()->change();
            $table->decimal('pending_amount', 10, 2)->nullable()->change();
            $table->decimal('discount', 10, 2)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('booking', function (Blueprint $table) {
        });
    }
};
