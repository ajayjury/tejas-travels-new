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
        Schema::create('seometas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('header')->nullable();
            $table->text('footer')->nullable();
            $table->timestamps();
        });

        DB::table('seometas')->insert(array('name' => 'home page'));
        DB::table('seometas')->insert(array('name' => 'faq page'));
        DB::table('seometas')->insert(array('name' => 'gallery page'));
        DB::table('seometas')->insert(array('name' => 'terms page'));
        DB::table('seometas')->insert(array('name' => 'help page'));
        DB::table('seometas')->insert(array('name' => 'contact page'));
        DB::table('seometas')->insert(array('name' => 'about page'));
        DB::table('seometas')->insert(array('name' => 'specific package page'));
        DB::table('seometas')->insert(array('name' => 'all package page'));
        DB::table('seometas')->insert(array('name' => 'hotel page'));
        DB::table('seometas')->insert(array('name' => 'all vehicles page'));
        DB::table('seometas')->insert(array('name' => 'tempo travels page'));
        DB::table('seometas')->insert(array('name' => 'tempo travels page'));
        DB::table('seometas')->insert(array('name' => 'bus page'));
        DB::table('seometas')->insert(array('name' => 'mini bus page'));
        DB::table('seometas')->insert(array('name' => 'cab page'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seometas');
    }
};
