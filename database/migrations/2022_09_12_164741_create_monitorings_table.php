<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonitoringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitorings', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // <- add this
            $table->string('id')->length(10)->primary();
            $table->string('id_hasil_verifikasi')->length(10);
            $table->integer('jumlah_mahasiswa');
            $table->date('tanggal');
            $table->string('materi')->length(50);
            $table->string('pertemuan');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('bukti')->length(255);
            $table->timestamps();
        });

        Schema::table('monitorings', function (Blueprint $table) {
            $table->foreign('id_hasil_verifikasi')->references('id')->on('hasilverifikasis')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monitorings');
    }
}
