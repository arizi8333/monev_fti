<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilverifikasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasilverifikasis', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // <- add this
            $table->string('id')->length(10)->primary();
            $table->string('id_dosen_verifikator')->length(10);
            $table->string('id_kelas_perkuliahan')->length(5);
            $table->string('timeline_perkuliahan')->length(20);
            $table->integer('status')->default(0);
            $table->date('tanggal_verifikasi');
            $table->string('tanda_tangan_verifikator')->length(255);
            $table->string('tanda_tangan_gkm')->length(255);
            $table->string('catatan')->length(50);
            $table->timestamps();
        });

        Schema::table('hasilverifikasis', function (Blueprint $table) {
            $table->foreign('id_dosen_verifikator')->references('nip')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_kelas_perkuliahan')->references('id')->on('kelasperkuliahans')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasilverifikasis');
    }
}
