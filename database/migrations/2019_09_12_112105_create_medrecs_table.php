<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedrecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medrecs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('medrec_name');
            $table->date('birthdate');
            $table->text('sex');
            $table->text('blood');
            $table->text('religion');
            $table->text('address');
            $table->text('city');
            $table->text('region');
            $table->text('postalcode');
            $table->text('parent');
            $table->text('phone1');
            $table->text('phone2');
            $table->text('email');
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
        Schema::dropIfExists('medrecs');
    }
}
