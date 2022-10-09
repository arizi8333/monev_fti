<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasperkuliahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelasperkuliahans', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // <- add this
            $table->string('id')->length(5)->primary();
            $table->string('id_dosen_pengampu')->length(15);
            $table->string('id_matakuliah')->length(5);
            $table->string('keterangan')->length(50);
            $table->integer('tahun_akademik');
            $table->integer('kurikulum');
            $table->integer('status')->default(0);
            $table->timestamps();
        });

        Schema::table('kelasperkuliahans', function (Blueprint $table) {
            $table->foreign('id_dosen_pengampu')->references('nip')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_matakuliah')->references('id')->on('matakuliahs')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelasperkuliahans');
    }
}
