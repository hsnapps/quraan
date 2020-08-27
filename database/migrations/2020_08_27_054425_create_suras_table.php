<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suras', function (Blueprint $table) {
            $table->increments('id');
            $table->char('lang', 2);
            $table->unsignedInteger('sura');
            $table->unsignedInteger('verse');
            $table->text('verse_text');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suras');
    }
}
