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
        Schema::create('holidaypackages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price_type');
            $table->integer('default_policy')->default(1);
            $table->text('policy')->nullable();
            $table->text('policy_formatted')->nullable();
            $table->integer('default_include_exclude')->default(1);
            $table->text('include_exclude')->nullable();
            $table->text('include_exclude_formatted')->nullable();
            $table->text('about')->nullable();
            $table->text('about_formatted')->nullable();
            $table->bigInteger('country_id');
            $table->bigInteger('state_id');
            $table->bigInteger('city_id');
            $table->decimal('price', 7, 2);
            $table->string('start_date');
            $table->string('end_date');
            $table->integer('day');
            $table->integer('night');
            $table->string('browser_title')->nullable();
            $table->string('url')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('seo_meta_header')->nullable();
            $table->text('seo_meta_footer')->nullable();
            $table->integer('status')->default(1);
            $table->text('image')->nullable();
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
        Schema::dropIfExists('holidaypackages');
    }
};
