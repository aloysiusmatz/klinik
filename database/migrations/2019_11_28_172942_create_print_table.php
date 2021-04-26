<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('printlog', function (Blueprint $table) {
            $table->increments('id');
            $table->string('print_type');
            $table->string('foreign_id');
            $table->date('date_from');
            $table->date('date_to');
            $table->string('field1');
            $table->string('field2');
            $table->string('field3');
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
        Schema::dropIfExists('printlog');
    }
}
