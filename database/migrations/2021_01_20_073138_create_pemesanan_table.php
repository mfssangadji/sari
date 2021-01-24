<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('reklame_id')->unsigned();
            $table->foreign('reklame_id')->references('id')->on('reklame')->onDelete('cascade');
            $table->date('tanggal_awal_pemasangan');
            $table->date('tanggal_akhir_pemasangan');
            $table->longtext('isi_reklame');
            $table->double('harga');
            $table->longtext('file_pendukung');
            $table->tinyInteger('status_perizinan');
            $table->tinyInteger('status_reklame');
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
        Schema::dropIfExists('pemesanan');
    }
}
