<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTitikReklameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titik_reklame', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('reklame_id')->unsigned();
            $table->foreign('reklame_id')->references('id')->on('reklame')->onDelete('cascade');
            $table->longtext('lokasi');
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
        Schema::dropIfExists('titik_reklame');
    }
}
