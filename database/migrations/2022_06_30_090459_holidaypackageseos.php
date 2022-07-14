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
        Schema::create('holidaypackageseos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('holidaypackage_id');
            $table->bigInteger('state_id');
            $table->bigInteger('city_id');
            $table->string('browser_title')->nullable();
            $table->string('url')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('seo_meta_header')->nullable();
            $table->text('seo_meta_footer')->nullable();
            $table->text('description')->nullable();
            $table->text('description_unformatted')->nullable();
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
        Schema::dropIfExists('holidaypackageseos');
    }
};
