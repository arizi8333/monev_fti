<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBerkasdokumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berkasdokumens', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // <- add this
            $table->string('id_kelas_perkuliahan')->length(5);
            $table->string('id_kategori_berkas')->length(3);
            $table->string('file_berkas')->length(255);
            $table->date('tanggal_upload');
            $table->integer('status')->default(0);
            $table->string('keterangan')->length(25);
            $table->timestamps();
        });

        Schema::table('berkasdokumens', function (Blueprint $table) {
            $table->foreign('id_kelas_perkuliahan')->references('id')->on('kelasperkuliahans')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_kategori_berkas')->references('id')->on('kategoriberkas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berkasdokumens');
    }
}
