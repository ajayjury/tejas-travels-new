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
        Schema::create('commons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description_formatted');
            $table->text('description_unformatted');
            $table->timestamps();
        });

        DB::table('commons')->insert(array('name' => 'local ride - terms & condition','description_formatted' => 'test','description_unformatted' => 'test'));
        DB::table('commons')->insert(array('name' => 'local ride - include/exclude','description_formatted' => 'test','description_unformatted' => 'test'));
        DB::table('commons')->insert(array('name' => 'local ride - description','description_formatted' => 'test','description_unformatted' => 'test'));
        DB::table('commons')->insert(array('name' => 'local ride - notes','description_formatted' => 'test','description_unformatted' => 'test'));
        DB::table('commons')->insert(array('name' => 'holiday packages - terms & condition','description_formatted' => 'test','description_unformatted' => 'test'));
        DB::table('commons')->insert(array('name' => 'holiday packages - policy','description_formatted' => 'test','description_unformatted' => 'test'));
        DB::table('commons')->insert(array('name' => 'outstation - terms & condition','description_formatted' => 'test','description_unformatted' => 'test'));
        DB::table('commons')->insert(array('name' => 'outstation - include/exclude','description_formatted' => 'test','description_unformatted' => 'test'));
        DB::table('commons')->insert(array('name' => 'outstation - description','description_formatted' => 'test','description_unformatted' => 'test'));
        DB::table('commons')->insert(array('name' => 'outstation - notes','description_formatted' => 'test','description_unformatted' => 'test'));
        DB::table('commons')->insert(array('name' => 'airport - terms & condition','description_formatted' => 'test','description_unformatted' => 'test'));
        DB::table('commons')->insert(array('name' => 'airport - include/exclude','description_formatted' => 'test','description_unformatted' => 'test'));
        DB::table('commons')->insert(array('name' => 'airport - description','description_formatted' => 'test','description_unformatted' => 'test'));
        DB::table('commons')->insert(array('name' => 'airport - notes','description_formatted' => 'test','description_unformatted' => 'test'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commons');
    }
};
