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
        Schema::create('access_levels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('access')->nullable();
            $table->timestamps();
        });
        DB::table('access_levels')->insert(array('name' => 'Super Admin','access' => json_encode(['0','1','2','3','4','5','6','7'])));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('access_levels');
    }
};
