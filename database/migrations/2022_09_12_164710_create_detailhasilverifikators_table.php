<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailhasilverifikatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailhasilverifikators', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // <- add this
            $table->string('id_hasil_verifikasi')->length(10);
            $table->string('id_jenis_kelengkapan_dokumen')->length(3);
            $table->integer('penilaian');
            $table->string('keterangan')->length(20);
            $table->timestamps();
        });

        Schema::table('detailhasilverifikators', function (Blueprint $table) {
            $table->foreign('id_hasil_verifikasi')->references('id')->on('hasilverifikasis')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_jenis_kelengkapan_dokumen')->references('id')->on('jeniskelengkapandokumens')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detailhasilverifikators');
    }
}
