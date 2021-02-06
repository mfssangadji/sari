<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKategoriOnReklameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reklame', function (Blueprint $table) {
            $table->bigInteger('kategori_id')->unsigned()->index()->nullable();
            $table->foreign('kategori_id')->references('id')->on('kategori_reklame');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
