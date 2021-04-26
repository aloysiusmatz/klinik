<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSpecialNoteToMedrecs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medrecs', function($table) {
            $table->string('special_note');
            $table->string('allergies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medrecs', function($table) {
            $table->dropColumn('special_note');
            $table->dropColumn('allergies');
        });
    }
}
